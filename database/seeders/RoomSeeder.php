<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([

            // FIK (id = 1)

            [
                'fakultas_id' => 1,
                'nama_ruangan' => 'R.101',
                'kapasitas' => 40,
                'fasilitas' => 'AC, Proyektor, Whiteboard',
                'status' => 'tersedia',
            ],

            [
                'fakultas_id' => 1,
                'nama_ruangan' => 'Lab Multimedia',
                'kapasitas' => 30,
                'fasilitas' => '30 PC, AC, Proyektor',
                'status' => 'tersedia',
            ],

            // FEBIS (id = 2)

            [
                'fakultas_id' => 2,
                'nama_ruangan' => 'R.201',
                'kapasitas' => 35,
                'fasilitas' => 'AC, LCD Projector',
                'status' => 'tersedia',
            ],

            [
                'fakultas_id' => 2,
                'nama_ruangan' => 'Aula FEBIS',
                'kapasitas' => 150,
                'fasilitas' => 'Sound System, Proyektor, Panggung',
                'status' => 'dipinjam',
            ],

            // FIKES (id = 3)

            [
                'fakultas_id' => 3,
                'nama_ruangan' => 'Lab Keperawatan',
                'kapasitas' => 25,
                'fasilitas' => 'Bed Praktikum, AC, LCD',
                'status' => 'tersedia',
            ],

            [
                'fakultas_id' => 3,
                'nama_ruangan' => 'Aula FIKES',
                'kapasitas' => 100,
                'fasilitas' => 'Sound System, AC',
                'status' => 'ditutup',
            ],

        ]);
    }
}