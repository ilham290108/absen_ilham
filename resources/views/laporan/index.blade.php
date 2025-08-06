@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"> Laporan Absensi Siswa</h2>
            <a href="{{ route('laporan.sync') }}" class="btn btn-warning shadow-sm"
                onclick="return confirm('Apakah Anda yakin ingin menyinkronkan ulang data laporan?\nIni akan menghapus data laporan yang ada dan membuat ulang dari data siswa.')">
                <i class="fas fa-sync-alt me-1"></i> Sinkronkan Data
            </a>
        </div>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Form Pencarian --}}
        <form action="{{ route('laporan.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="🔍 Cari nama, tanggal, atau waktu..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        {{-- Tabel Data --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm bg-white text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kode Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Waktu Mulai</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporans as $index => $laporan)
                        <tr>
                            <td>{{ $laporans->firstItem() + $index }}</td>
                            <td><span class="badge bg-info text-dark">{{ $laporan->kode_siswa }}</span></td>
                            <td class="fw-semibold">{{ $laporan->nama_siswa }}</td>
                            <td>{{ $laporan->waktu_mulai }}</td>
                            <td>{{ $laporan->tanggal_kegiatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Navigasi Halaman --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $laporans->links() }}
        </div>
    </div>
@endsection