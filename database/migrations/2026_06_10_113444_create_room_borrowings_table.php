<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_borrowings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('mulai_peminjaman');

            $table->dateTime('selesai_peminjaman');

            $table->string('kategori_pengaju');

            $table->string('detail_pengaju');

            $table->string('nama_kegiatan');

            $table->integer('jumlah_peserta');

            $table->text('deskripsi_kegiatan')
                ->nullable();

            $table->string('file_pengajuan')
                ->nullable();

            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak',
                'dibatalkan'
            ])->default('menunggu');

            $table->text('catatan_admin')
                ->nullable();

            $table->timestamps();
        });
    }
};
