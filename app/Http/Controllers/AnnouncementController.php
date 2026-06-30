<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view(
            'admin.announcements.index',
            compact('announcements')
        );
    }

    public function create()
    {
        return view(
            'admin.announcements.create'
        );
    }

    public function store(Request $request)
    {
        Announcement::create([

            'judul' => $request->judul,

            'isi' => $request->isi

        ]);

        return redirect(
            '/admin/announcements'
        );
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    public function update(
    Request $request,
    $id
    )
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->update([

            'judul' => $request->judul,

            'isi' => $request->isi

        ]);

        return redirect(
            '/admin/announcements'
        );
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->delete();

        return redirect(
            '/admin/announcements'
        );
    }
}

