<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'nama_fakultas'
    ];

    public function rooms()
    {
        return $this->hasMany(
            Room::class,
            'fakultas_id'
        );
    }

    public function users()
    {
        return $this->hasMany(
            User::class,
            'fakultas_id'
        );
    }
}