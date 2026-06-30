<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalendarEvent;
use App\Models\Announcement;
use App\Models\Rule;

class DashboardSeeder extends Seeder
{
    public function run(): void
    {
        CalendarEvent::create([
            'tanggal' => '2026-06-11',
            'status' => 'ditutup',
            'judul' => 'Wisuda',
            'keterangan' => 'Pengajuan ditutup karena kegiatan wisuda.'
        ]);

        Announcement::create([
            'judul' => 'Pengajuan Ditutup',
            'isi' => 'Pengajuan peminjaman ruangan ditutup karena kegiatan wisuda universitas.'
        ]);

        Rule::create([
            'isi' => 'Surat Permohonan dan TOR wajib digabung menjadi satu file PDF.'
        ]);

        Rule::create([
            'isi' => 'Pengajuan dilakukan minimal H-3 sebelum kegiatan.'
        ]);
    }
}