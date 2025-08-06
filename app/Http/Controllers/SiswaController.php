<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Daftar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('daftar')->get();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $daftars = Daftar::all();
        return view('siswa.create', compact('daftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_siswa' => 'required|integer', 
            'waktu_mulai' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan.');
    }

    public function show(Siswa $siswa)
    {
        $siswa->load('daftar'); 
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $daftars = Daftar::all();
        return view('siswa.edit', compact('siswa', 'daftars'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'kode_siswa' => 'required|integer', 
            'waktu_mulai' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}