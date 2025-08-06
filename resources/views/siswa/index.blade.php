@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"> Input Absensi Siswa</h2>
            <a href="{{ route('siswa.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-user-plus me-1"></i> Tambah Absen
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm bg-white">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu Mulai</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $index => $siswa)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $siswa->daftar->nama ?? '-' }}</td>
                            <td>{{ $siswa->waktu_mulai }}</td>
                            <td>{{ $siswa->tanggal_kegiatan }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data absensi siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection