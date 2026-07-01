<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\CalendarEvent;
use App\Models\Faculty;
use App\Models\Room;
use App\Models\RoomBorrowing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [

            'roomCount' => Room::count(),

            'facultyCount' => Faculty::count(),

            'borrowingCount' => RoomBorrowing::count(),

            'announcementCount' => Announcement::count(),

            'rooms' => Room::with('faculty')
                ->latest()
                ->take(6)
                ->get(),

            'announcements' => Announcement::latest()
                ->take(3)
                ->get(),

            'events' => CalendarEvent::orderBy('tanggal')
                ->take(3)
                ->get(),

        ]);
    }
}