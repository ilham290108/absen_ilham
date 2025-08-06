@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 fw-bold"> Tambah Data Siswa</h3>

        <div class="card shadow p-4">
            <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Siswa</label>
                    <input type="number" name="kode_siswa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('daftar.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-primary"> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection