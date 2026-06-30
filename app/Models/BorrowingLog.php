<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingLog extends Model
{
    protected $fillable = [

        'room_borrowing_id',

        'aktivitas'
    ];

    public function borrowing()
    {
        return $this->belongsTo(
            RoomBorrowing::class,
            'room_borrowing_id'
        );
    }
}