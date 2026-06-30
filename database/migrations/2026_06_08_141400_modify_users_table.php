<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('fakultas_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('faculties')
                  ->nullOnDelete();

            $table->string('nomor_identitas')
                  ->unique()
                  ->after('fakultas_id');

            $table->date('tanggal_lahir')
                  ->nullable()
                  ->after('email');

            $table->enum('role', [
                'mahasiswa',
                'dosen',
                'admin'
            ])->default('mahasiswa');

            $table->boolean('status_aktif')
                  ->default(true);

            $table->boolean('password_changed')
                  ->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['fakultas_id']);

            $table->dropColumn([
                'fakultas_id',
                'nomor_identitas',
                'tanggal_lahir',
                'role',
                'status_aktif',
                'password_changed'
            ]);
        });
    }
};