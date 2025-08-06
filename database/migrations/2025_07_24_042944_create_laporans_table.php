<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_siswa')->unsigned();
            $table->string('nama_siswa');
            $table->string('waktu_mulai');
            $table->string('tanggal_kegiatan');
            $table->timestamps();

            $table->foreign('kode_siswa')->references('kode_siswa')->on('daftars')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
