<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([

            'fakultas_id' => 'required',

            'nama_ruangan' => 'required',

            'kapasitas' => 'required|integer',

            'fasilitas' => 'nullable',

            'status' => 'required',

            'alasan_ditutup' => 'nullable',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request
                ->file('gambar')
                ->store('rooms', 'public');

        }

        Room::create($data);

        return redirect('/admin/rooms')
            ->with('success', 'Ruangan berhasil ditambahkan.');
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
        $room = Room::findOrFail($id);

        $data = $request->validate([

            'fakultas_id' => 'required',

            'nama_ruangan' => 'required',

            'kapasitas' => 'required|integer',

            'fasilitas' => 'nullable',

            'status' => 'required',

            'alasan_ditutup' => 'nullable',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama jika ada
            if ($room->gambar && Storage::disk('public')->exists($room->gambar)) {

                Storage::disk('public')->delete($room->gambar);

            }

            // Simpan gambar baru
            $data['gambar'] = $request
                ->file('gambar')
                ->store('rooms', 'public');
        }

        $room->update($data);

        return redirect('/admin/rooms')
            ->with('success', 'Ruangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();

        return redirect('/admin/rooms');
    }
}