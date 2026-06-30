<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'fakultas_id',

        'name',

        'email',

        'nomor_identitas',

        'tanggal_lahir',

        'password',

        'role',

        'status_aktif',

        'password_changed'
    ];

    protected $hidden = [

        'password',

        'remember_token'
    ];

    protected function casts(): array
    {
        return [

            'password' => 'hashed',

            'status_aktif' => 'boolean',

            'password_changed' => 'boolean'
        ];
    }

    public function faculty()
    {
        return $this->belongsTo(
            Faculty::class,
            'fakultas_id'
        );
    }

    public function roomBorrowings()
    {
        return $this->hasMany(
            RoomBorrowing::class
        );
    }

    public function notifications()
    {
        return $this->hasMany(
            Notification::class
        );
    }
}