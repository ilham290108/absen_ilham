<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Daftar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahAbsen = Daftar::count();

        return view('dashboard', [
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahAbsen' => $jumlahAbsen
        ]);
    }
}

