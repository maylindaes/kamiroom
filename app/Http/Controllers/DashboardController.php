<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Rule;
use App\Models\CalendarEvent;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomBorrowing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function user()
    {
        $user = Auth::user();

        if (
            $user &&
            !$user->password_changed
        ) {
            return redirect('/change-password');
        }

        $announcements =
            Announcement::latest()->get();

        $rules =
            Rule::latest()->get();

        $today = Carbon::now();

        $currentMonth =
            $today->month;

        $currentYear =
            $today->year;

        $daysInMonth =
            $today->daysInMonth;

        $firstDayOfMonth =
            Carbon::create(
                $currentYear,
                $currentMonth,
                1
            );

        $startDay =
            $firstDayOfMonth->dayOfWeek;

        $events =
            CalendarEvent::whereMonth(
                'tanggal',
                $currentMonth
            )
            ->whereYear(
                'tanggal',
                $currentYear
            )
            ->get();

        $eventDays = [];

        foreach ($events as $event) {

            $day =
                Carbon::parse(
                    $event->tanggal
                )->day;

            $eventDays[$day] = [

                'status' =>
                    $event->status,

                'judul' =>
                    $event->judul,

                'keterangan' =>
                    $event->keterangan,

                'tanggal' =>
                    $event->tanggal
            ];
        }

        $todayStatus = 'dibuka';

        if (isset($eventDays[$today->day])) {
            $todayStatus = $eventDays[$today->day]['status'];
        }

        return view('dashboard.user', compact(
                'announcements',
                'rules',
                'events',
                'eventDays',
                'currentMonth',
                'currentYear',
                'daysInMonth',
                'startDay',
                'todayStatus'
            )
        );
    }

    public function admin()
    {
        $totalUsers =
            User::count();

        $totalRooms =
            Room::count();

        $pendingBorrowings =
            RoomBorrowing::where(
                'status',
                'menunggu'
            )->count();

        $approvedBorrowings =
            RoomBorrowing::where(
                'status',
                'disetujui'
            )->count();

        $rejectedBorrowings =
            RoomBorrowing::where(
                'status',
                'ditolak'
            )->count();

        $closedRooms =
            Room::where(
                'status',
                'ditutup'
            )->count();

        $activeRooms =
            RoomBorrowing::where(
                'status',
                'disetujui'
            )
            ->where(
                'mulai_peminjaman',
                '<=',
                now()
            )
            ->where(
                'selesai_peminjaman',
                '>=',
                now()
            )
            ->count();

        return view(
            'dashboard.admin',
            compact(
                'totalUsers',
                'totalRooms',
                'pendingBorrowings',
                'approvedBorrowings',
                'rejectedBorrowings',
                'closedRooms',
                'activeRooms'
            )
        );
    }
}