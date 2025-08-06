@extends('layouts.main')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"> Daftar Data Siswa</h2>
            <a href="{{ route('daftar.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Tambah Absen
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($daftars->count())
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center shadow-sm bg-white">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Kode Siswa</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftars as $sw)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-primary">{{ $sw->kode_siswa }}</span></td>
                                <td>
                                    @if($sw->foto)
                                        <img src="{{ asset('storage/' . $sw->foto) }}" class="rounded-circle shadow-sm" alt="Foto Siswa"
                                            width="50" height="50" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted fst-italic">Tidak Ada</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $sw->nama }}</td>
                                <td>{{ $sw->jurusan }}</td>
                                <td class="text-start">{{ $sw->alamat }}</td>
                                <td>{{ $sw->no_hp }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('daftar.show', $sw->kode_siswa) }}"
                                            class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('daftar.edit', $sw->kode_siswa) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('daftar.destroy', $sw->kode_siswa) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Belum ada data siswa yang tersedia.
            </div>
        @endif
    </div>
@endsection