<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::orderBy('tanggal')->get();

        return view(
            'admin.calendar.index',
            compact('events')
        );
    }

    public function create()
    {
        return view('admin.calendar.create');
    }

    public function store(Request $request)
    {
        CalendarEvent::create([

            'judul' => $request->judul,

            'keterangan' => $request->keterangan,

            'tanggal' => $request->tanggal,

            'status' => $request->status

        ]);

        return redirect('/admin/calendar')
            ->with('success','Event berhasil ditambahkan');
    }

    public function edit($id)
    {
        $event = CalendarEvent::findOrFail($id);

        return view(
            'admin.calendar.edit',
            compact('event')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        
        $event = CalendarEvent::findOrFail($id);

        $event->update([

            'judul' => $request->judul,

            'keterangan' => $request->keterangan,

            'tanggal' => $request->tanggal,

            'status' => $request->status

        ]);

        return redirect('/admin/calendar')
            ->with('success','Event berhasil diupdate');
    }


    public function destroy($id)
    {
        CalendarEvent::findOrFail($id)->delete();

        return redirect('/admin/calendar');
    }
}