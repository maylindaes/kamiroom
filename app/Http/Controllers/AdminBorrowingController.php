<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBorrowing;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\BorrowingLog;
use App\Models\Notification;


class AdminBorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = RoomBorrowing::with([
            'room',
            'logs'
        ]);

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'nama_kegiatan',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'detail_pengaju',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'id',
                    $request->search
                );

            });
        }

        if (
            $request->status &&
            $request->status != 'semua'
        ) {

            $query->where(
                'status',
                $request->status
            );
        }

        $borrowings = $query
            ->latest()
            ->get();

        return view(
            'admin.borrowings.index',
            compact('borrowings')
        );
    }

    public function show($id)
    {
        $borrowing = RoomBorrowing::with([
            'room',
            'user'
        ])
        ->findOrFail($id);

        return view(
            'admin.borrowings.show',
            compact('borrowing')
        );
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'surat_persetujuan' =>
                'required|mimes:pdf|max:2048'
        ]);

        $borrowing = RoomBorrowing::findOrFail($id);

        $path = $request
            ->file('surat_persetujuan')
            ->store(
                'surat-persetujuan',
                'public'
            );

        $borrowing->update([
            'status' => 'disetujui',
            'surat_persetujuan' => $path
        ]);

        $conflict = RoomBorrowing::where(
            'room_id',
            $borrowing->room_id
        )

        ->where(
            'status',
            'disetujui'
        )

        ->where(
            'id',
            '!=',
            $borrowing->id
        )

        ->where(function ($q) use ($borrowing) {

            $q->where(
                'mulai_peminjaman',
                '<',
                $borrowing->selesai_peminjaman
            )

            ->where(
                'selesai_peminjaman',
                '>',
                $borrowing->mulai_peminjaman
            );
        })

        ->exists();

        Notification::create([

            'user_id' =>
                $borrowing->user_id,

            'judul' =>
                'Pengajuan Disetujui',

            'pesan' =>
                'Pengajuan "' .
                $borrowing->nama_kegiatan .
                '" telah disetujui.'
        ]);

        BorrowingLog::create([
            'room_borrowing_id' => $borrowing->id,
            'aktivitas' => 'Pengajuan disetujui admin'
        ]);

        if ($borrowing->status != 'menunggu') {

            return back()->with(
                'error',
                'Pengajuan sudah diproses'
            );
        }

        return redirect(
            '/admin/borrowings/'.$id
        )->with(
            'success',
            'Pengajuan berhasil disetujui.'
        );

    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'required'
        ]);

        $borrowing = RoomBorrowing::findOrFail($id);

        $borrowing->update([
            'status' => 'ditolak',
            'catatan_admin' =>
                $request->catatan_admin
        ]);

        Notification::create([

            'user_id' =>
                $borrowing->user_id,

            'judul' =>
                'Pengajuan Ditolak',

            'pesan' =>
                'Pengajuan "' .
                $borrowing->nama_kegiatan .
                '" ditolak.'
        ]);

        BorrowingLog::create([
            'room_borrowing_id' => $borrowing->id,
            'aktivitas' => 'Pengajuan ditolak admin'
        ]);

        if ($borrowing->status != 'menunggu') {

            return back()->with(
                'error',
                'Pengajuan sudah diproses'
            );
        }

        return redirect(
            '/admin/borrowings/'.$id
        );
    }

    public function rejectForm($id)
    {
        $borrowing = RoomBorrowing::findOrFail($id);

        return view(
            'admin.borrowings.reject',
            compact('borrowing')
        );
    }

    public function exportPdf()
    {
        $borrowings = \App\Models\RoomBorrowing::with(
            'user',
            'room'
        )->get();

        $pdf = Pdf::loadView(
            'admin.borrowings.pdf',
            compact('borrowings')
        );

        return $pdf->download(
            'laporan-peminjaman.pdf'
        );
    }

    public function downloadPdf($id)
    {
        $borrowing = RoomBorrowing::findOrFail($id);

        $path = storage_path(
            'app/public/' .
            $borrowing->file_pengajuan
        );

        if (!file_exists($path)) {

            abort(404);
        }

        return response()->download($path);
    }

    public function previewPdf($id)
    {
        $borrowing = RoomBorrowing::findOrFail($id);

        $path = storage_path(
            'app/public/' .
            $borrowing->file_pengajuan
        );

        if (!file_exists($path)) {

            abort(404);
        }

        return response()->file($path);
    }
}