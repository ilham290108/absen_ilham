<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
{
    public function index()
    {
    $daftars = Daftar::with('siswa')->get();
    return view('daftar.index', compact('daftars'));
    }


   public function create()
{
    $daftars = \App\Models\Daftar::all(); 
    return view('daftar.create', compact('daftars'));
}


    public function store(Request $request)
    {
        $request->validate([
            'kode_siswa' => 'required|integer|unique:daftars',
            'foto' => 'nullable|image|max:2048',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_daftars', 'public');
        }

        Daftar::create($data);

        return redirect()->route('daftar.index')->with('tambah', 'Data berhasil ditambahkan.');

    }

    public function show($kode_siswa)
    {
        $daftar = Daftar::where('kode_siswa', $kode_siswa)->firstOrFail();
        return view('daftar.show', compact('daftar'));
    }

    public function edit($kode_siswa)
    {
        $daftar = Daftar::where('kode_siswa', $kode_siswa)->firstOrFail();
        return view('daftar.edit', compact('daftar'));
    }

    public function update(Request $request, $kode_siswa)
    {
        $daftar = Daftar::where('kode_siswa', $kode_siswa)->firstOrFail();

        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($daftar->foto) {
                Storage::disk('public')->delete($daftar->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_daftars', 'public');
        }

        $daftar->update($data);

        return redirect()->route('daftar.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($kode_siswa)
    {
        $daftar = Daftar::where('kode_siswa', $kode_siswa)->firstOrFail();

        if ($daftar->foto) {
            Storage::disk('public')->delete($daftar->foto);
        }

        $daftar->delete();

        return redirect()->route('daftar.index')->with('success', 'Data berhasil dihapus.');
    }
}
