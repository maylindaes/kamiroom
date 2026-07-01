<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Faculty;
use App\Models\RoomBorrowing;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [

            'jumlahRuangan' => Room::count(),

            'jumlahFakultas' => Faculty::count(),

            'jumlahPengajuan' => RoomBorrowing::count()

        ]);
    }
}