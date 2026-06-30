<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomBorrowing;

class Room extends Model
{
    protected $fillable = [
        'fakultas_id',
        'nama_ruangan',
        'kapasitas',
        'fasilitas',
        'status',
        'alasan_ditutup'
    ];

    public function faculty()
    {
        return $this->belongsTo(
            Faculty::class,
            'fakultas_id'
        );
    }

    public function borrowings()
    {
        return $this->hasMany(
            RoomBorrowing::class
        );
    }
}