@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4"> Detail Absen Siswa</h2>

        <div class="card shadow p-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ $siswa->daftar->nama ?? '-' }}</li>
                <li class="list-group-item"><strong>Waktu Mulai:</strong> {{ $siswa->waktu_mulai }}</li>
                <li class="list-group-item"><strong>Tanggal Kegiatan:</strong> {{ $siswa->tanggal_kegiatan }}</li>
            </ul>

            <div class="mt-4 text-end">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>
    </div>
@endsection