@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-bold"> Edit Data Siswa</h3>

        <div class="card shadow p-4">
            <form action="{{ route('daftar.update', $daftar->kode_siswa) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode Siswa</label>
                    <input type="number" name="kode_siswa" class="form-control" value="{{ $daftar->kode_siswa }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto (Biarkan kosong jika tidak diubah)</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($daftar->foto)
                        <img src="{{ asset('storage/' . $daftar->foto) }}" width="80" class="mt-2 rounded shadow-sm">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $daftar->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ $daftar->jurusan }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ $daftar->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $daftar->no_hp }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('daftar.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-success"> Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection