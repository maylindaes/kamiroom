<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faculties')->insert([
            ['nama_fakultas' => 'FIK'],
            ['nama_fakultas' => 'FEBIS'],
            ['nama_fakultas' => 'FIKES'],
        ]);
    }
}