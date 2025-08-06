<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Siswa; // Diperlukan untuk fungsi sync
use App\Models\Daftar; // Diperlukan untuk fungsi sync
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Diperlukan untuk transaksi database

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('kode_siswa', 'like', '%' . $searchTerm . '%')
                ->orWhere('nama_siswa', 'like', '%' . $searchTerm . '%')
                ->orWhere('tanggal_kegiatan', 'like', '%' . $searchTerm . '%')
                ->orWhere('waktu_mulai', 'like', '%' . $searchTerm . '%');
        }

        $laporans = $query->orderBy('tanggal_kegiatan', 'desc')
            ->orderBy('waktu_mulai', 'desc')
            ->paginate(10); 

        return view('laporan.index', compact('laporans'));
    }

    public function sync()
    {
        DB::beginTransaction();
        try {
            Laporan::truncate();

            $siswas = Siswa::with('daftar')->get();

            foreach ($siswas as $siswa) {
                $namaSiswa = $siswa->daftar->nama ?? 'Nama Tidak Ditemukan';

                Laporan::create([
                    'kode_siswa' => $siswa->kode_siswa,
                    'nama_siswa' => $namaSiswa,
                    'waktu_mulai' => $siswa->waktu_mulai,
                    'tanggal_kegiatan' => $siswa->tanggal_kegiatan,
                ]);
            }

            DB::commit();
            return redirect()->route('laporan.index')->with('error', 'Gagal menyinkronkan data laporan: ');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('laporan.index')->with('success', 'Data laporan berhasil disinkronkan.');
        }
    }
}
