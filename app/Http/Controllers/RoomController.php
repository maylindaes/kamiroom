<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Faculty;
use App\Models\RoomBorrowing;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $faculty = $request->faculty;

        $query = Room::with([
            'faculty',
            'borrowings'
        ]);

        if ($faculty) {
            $query->where(
                'fakultas_id',
                $faculty
            );
        }

        $rooms = $query->get();

        foreach ($rooms as $room) {

            if ($room->status == 'ditutup') {

                $room->status_tampil = 'ditutup';

                continue;
            }

            $activeBorrowing = $room->borrowings()

                ->where('status', 'disetujui')

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

                ->first();

            if ($activeBorrowing) {

                $room->status_tampil = 'dipinjam';

                continue;
            }

            $booking = $room->borrowings()

                ->where('status', 'disetujui')

                ->where(
                    'mulai_peminjaman',
                    '>',
                    now()
                )

                ->exists();

            if ($booking) {

                $room->status_tampil = 'dibooking';

            } else {

                $room->status_tampil = 'tersedia';
            }
        }

        $faculties = Faculty::all();

        return view(
            'rooms.index',
            compact(
                'rooms',
                'faculties'
            )
        );
    }

    public function show($id)
    {
        $room = Room::with('faculty')
            ->findOrFail($id);

        $activeBorrowing = RoomBorrowing::with('user')

            ->where('room_id', $room->id)

            ->where('status', 'disetujui')

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

            ->first();

        $borrowings = RoomBorrowing::with('user')

            ->where('room_id', $room->id)

            ->where('status', 'disetujui')

            ->orderBy(
                'mulai_peminjaman',
                'desc'
            )

            ->take(10)

            ->get();

        return view(
            'rooms.show',
            compact(
                'room',
                'activeBorrowing',
                'borrowings'
            )
        );
    }
}