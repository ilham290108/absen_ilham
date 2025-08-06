@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <h3 class="fw-bold mb-4"> Detail Data Siswa</h3>

        <div class="card shadow p-4">
            <div class="text-center mb-4">
                @if ($daftar->foto)
                    <img src="{{ asset('storage/' . $daftar->foto) }}" class="rounded-circle shadow" width="100" height="100"
                        style="object-fit:cover;">
                @else
                    <p class="text-muted">Tidak ada foto</p>
                @endif
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Kode Siswa:</strong> {{ $daftar->kode_siswa }}</li>
                <li class="list-group-item"><strong>Nama:</strong> {{ $daftar->nama }}</li>
                <li class="list-group-item"><strong>Jurusan:</strong> {{ $daftar->jurusan }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $daftar->alamat }}</li>
                <li class="list-group-item"><strong>No HP:</strong> {{ $daftar->no_hp }}</li>
            </ul>

            <div class="mt-4 text-end">
                <a href="{{ route('daftar.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>
    </div>
@endsection