<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowingLog;

class RoomBorrowing extends Model
{
    protected $fillable = [

        'user_id',

        'room_id',

        'mulai_peminjaman',

        'selesai_peminjaman',

        'kategori_pengaju',

        'detail_pengaju',

        'nama_kegiatan',

        'jumlah_peserta',

        'deskripsi_kegiatan',

        'file_pengajuan',

        'status',

        'catatan_admin',

        'surat_persetujuan',

        'revisi_dari'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function room()
    {
        return $this->belongsTo(
            Room::class
        );
    }

    public function logs()
    {
        return $this->hasMany(
            BorrowingLog::class,
            'room_borrowing_id'
        );
    }
}