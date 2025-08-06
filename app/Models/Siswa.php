<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['kode_siswa', 'waktu_mulai', 'tanggal_kegiatan'];

    // Define the relationship with the Daftar model
    public function daftar()
    {
        return $this->belongsTo(Daftar::class, 'kode_siswa', 'kode_siswa');
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'kode_siswa', 'kode_siswa');
    }

}