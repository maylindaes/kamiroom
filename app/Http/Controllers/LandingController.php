<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Room;
use App\Models\RoomBorrowing;

class LandingController extends Controller
{
    public function index()
    {
        $rooms = Room::with('faculty')
            ->latest()
            ->take(3)
            ->get();

        return view('landing', [

            'jumlahRuangan'   => Room::count(),

            'jumlahFakultas'  => Faculty::count(),

            'jumlahPengajuan' => RoomBorrowing::count(),

            'rooms' => $rooms

        ]);
    }
}