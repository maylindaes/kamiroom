<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'fakultas_id' => null,
                'name' => 'Admin Kemahasiswaan',
                'email' => 'admin@kamiroom.test',
                'nomor_identitas' => 'ADM001',
                'tanggal_lahir' => '2000-01-01',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status_aktif' => true,
                'password_changed' => true,
            ],

            [
                'fakultas_id' => 1,
                'name' => 'Mahasiswa Demo',
                'email' => 'mahasiswa@kamiroom.test',
                'nomor_identitas' => '2313010001',
                'tanggal_lahir' => '2005-05-15',
                'password' => Hash::make('20050515'),
                'role' => 'mahasiswa',
                'status_aktif' => true,
                'password_changed' => false,
            ],

            [
                'fakultas_id' => 2,
                'name' => 'Dosen Demo',
                'email' => 'dosen@kamiroom.test',
                'nomor_identitas' => '120001',
                'tanggal_lahir' => '1985-08-20',
                'password' => Hash::make('19850820'),
                'role' => 'dosen',
                'status_aktif' => true,
                'password_changed' => false,
            ]

        ]);
    }
}