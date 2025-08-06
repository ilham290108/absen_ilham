<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_siswa',
        'nama_siswa',
        'waktu_mulai',
        'tanggal_kegiatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }

    public function daftar()
    {
        return $this->belongsTo(Daftar::class, 'kode_siswa', 'kode_siswa');
    }
}
