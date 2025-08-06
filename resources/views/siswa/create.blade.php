@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4"> Tambah Absen Siswa</h2>

        <div class="card shadow p-4">
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Siswa</label>
                    <select name="kode_siswa" class="form-select" required>
                        <option value="">-- Pilih Kode Siswa --</option>
                        @foreach ($daftars as $s)
                            <option value="{{ $s->kode_siswa }}">
                                {{ $s->kode_siswa }} - {{ $s->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ old('tanggal_kegiatan') }}"
                        required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-success"> Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection