<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->id();

            $table->foreignId('fakultas_id')
                  ->constrained('faculties')
                  ->cascadeOnDelete();

            $table->string('nama_ruangan');

            $table->integer('kapasitas');

            $table->text('fasilitas')
                  ->nullable();

            $table->enum('status', [
                'tersedia',
                'dipinjam',
                'ditutup'
            ])->default('tersedia');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};