<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('daftars', function (Blueprint $table) {
            $table->bigIncrements('kode_siswa')->primary();
            $table->string('foto');
            $table->string('nama');
            $table->string('jurusan');
            $table->text('alamat');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('daftars');
    }
};
