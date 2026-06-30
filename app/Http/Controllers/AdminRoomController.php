<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Faculty;


class AdminRoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::with('faculty');

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'nama_ruangan',
                    'like',
                    '%' . $request->search . '%'
                );

            });
        }

        $rooms = $query
            ->latest()
            ->get();

        return view(
            'admin.rooms.index',
            compact('rooms')
        );
    }

    public function create()
    {
        $faculties = Faculty::all();

        return view(
            'admin.rooms.create',
            compact('faculties')
        );
    }

    public function store(Request $request)
    {
        Room::create($request->all());

        return redirect('/admin/rooms');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        $faculties = Faculty::all();

        return view(
            'admin.rooms.edit',
            compact(
                'room',
                'faculties'
            )
        );
    }

    public function update(Request $request, $id)
    {
        Room::findOrFail($id)
            ->update($request->all());

        return redirect('/admin/rooms');
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();

        return redirect('/admin/rooms');
    }
}