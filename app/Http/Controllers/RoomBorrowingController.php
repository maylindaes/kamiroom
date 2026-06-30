<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBorrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BorrowingLog;

class RoomBorrowingController extends Controller
{
    public function index()
    {
        $borrowings = RoomBorrowing::with([
            'room',
            'logs'
        ])
            ->where(
                'user_id',
                Auth::id()
            )

            ->latest()

            ->get();

        return view(
            'borrowings.index',
            compact('borrowings')
        );
    }

    public function create(Request $request)
    {
        $selectedRoom = null;

        $copyBorrowing = null;

        if ($request->room) {

            $selectedRoom = Room::find(
                $request->room
            );
        }

        if ($request->copy) {

            $copyBorrowing = RoomBorrowing::find(
                $request->copy
            );
        }

        $rooms = Room::where(
            'status',
            'tersedia'
        )->get();

        return view(
            'borrowings.create',
            compact(
                'rooms',
                'selectedRoom',
                'copyBorrowing'
            )
        );
    }

    public function store(Request $request)
    {
        $filePath = null;

        if ($request->hasFile('file_pengajuan')) {

            $filePath = $request
                ->file('file_pengajuan')
                ->store(
                    'pengajuan',
                    'public'
                );
        }

        $conflict = RoomBorrowing::where(
            'room_id',
            $request->room_id
        )

        ->where(
            'status',
            'disetujui'
        )

        ->where(function ($query) use ($request) {

            $query

            ->where(
                'mulai_peminjaman',
                '<',
                $request->selesai_peminjaman
            )

            ->where(
                'selesai_peminjaman',
                '>',
                $request->mulai_peminjaman
            );

        })

        ->exists();

        if ($conflict) {

            return back()

                ->withErrors([
                    'Ruangan sudah dibooking pada waktu tersebut.'
                ])

                ->withInput();
        }

        $request->validate([

            'room_id' => 'required',

            'mulai_peminjaman' => 'required|date',

            'selesai_peminjaman' => 'required|date|after:mulai_peminjaman',

            'nama_kegiatan' => 'required',

            'jumlah_peserta' => 'required|integer|min:1',
            
            'file_pengajuan' => 'required|mimes:pdf|max:2048'

        ]);

        $selisih = now()->diffInDays(
            $request->mulai_peminjaman,
            false
        );

        if ($selisih < 3) {

            return back()

                ->withErrors([
                    'Pengajuan harus minimal H-3.'
                ])

                ->withInput();
        }

        $room = Room::findOrFail(
            $request->room_id
        );

        if (
            $request->jumlah_peserta >
            $room->kapasitas
        ) {

            return back()

                ->withErrors([
                    'Jumlah peserta melebihi kapasitas ruangan.'
                ])

                ->withInput();
        }

        $borrowing = RoomBorrowing::create([

            'user_id' => Auth::id(),

            'room_id' => $request->room_id,

            'mulai_peminjaman' =>
                $request->mulai_peminjaman,

            'selesai_peminjaman' =>
                $request->selesai_peminjaman,

            'kategori_pengaju' =>
                $request->kategori_pengaju,

            'detail_pengaju' =>
                $request->detail_pengaju,

            'nama_kegiatan' =>
                $request->nama_kegiatan,

            'jumlah_peserta' =>
                $request->jumlah_peserta,

            'deskripsi_kegiatan' =>
                $request->deskripsi_kegiatan,

            'file_pengajuan' =>
                $filePath,

            'status' => 'menunggu',

            'revisi_dari' => $request->revisi_dari
        ]);

        BorrowingLog::create([

            'room_borrowing_id' =>
                $borrowing->id,

            'aktivitas' =>
                'Pengajuan dibuat'
        ]);

        return redirect(
            '/my-borrowings'
        );
    }

    public function cancel($id)
    {
        $borrowing = RoomBorrowing::

            where(
                'id',
                $id
            )

            ->where(
                'user_id',
                Auth::id()
            )

            ->firstOrFail();

        if (
            $borrowing->status !== 'menunggu'
        ) {
            return back();
        }

        $borrowing->update([

            'status' =>
                'dibatalkan'

        ]);

        return redirect(
            '/my-borrowings'
        );
    }

    public function proposal($id)
    {
        $borrowing = RoomBorrowing::

            where(
                'id',
                $id
            )

            ->where(
                'user_id',
                Auth::id()
            )

            ->firstOrFail();

        $path = storage_path(
            'app/public/' .
            $borrowing->file_pengajuan
        );

        if (!file_exists($path)) {

            abort(404);
        }

        return response()->file($path);
    }

    public function verify($id)
    {
        $borrowing = RoomBorrowing::with(
            'room',
            'user'
        )

        ->where(
            'id',
            $id
        )

        ->where(
            'user_id',
            Auth::id()
        )

        ->firstOrFail();

        return view(
            'borrowings.verify',
            compact('borrowing')
        );
    }

    public function qr($id)
    {
        $borrowing = RoomBorrowing::findOrFail($id);

        return view(
            'borrowings.qr',
            compact('borrowing')
        );
    }
}