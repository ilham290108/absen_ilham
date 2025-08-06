<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Daftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_siswa',
        'foto',
        'nama',
        'jurusan',
        'alamat',
        'no_hp',
    ];

    protected $primaryKey = 'kode_siswa';
    public $incrementing = false;
    protected $keyType = 'int';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }
}
