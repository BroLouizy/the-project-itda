@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-4 shadow-sm border-0" style="border-radius: 12px;">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-users fa-2x text-primary me-3"></i>
                <div>
                    <h3 class="mb-0">{{ $totalSiswa }}</h3>
                    <small class="text-muted">Total Siswa Terdaftar</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-4 shadow-sm border-0" style="border-radius: 12px;">
    <h5 class="mb-3">Hasil Tes Terbaru</h5>

    @if ($hasilTes->isEmpty())
        <p class="text-muted mb-0">Belum ada siswa yang mengikuti tes.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Sekolah</th>
                        <th>Jurusan Rekomendasi</th>
                        <th>Persentase</th>
                        <th>Tanggal Tes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilTes as $hasil)
                        <tr>
                            <td>{{ $hasil->user->name }}</td>
                            <td>{{ $hasil->user->school_name }}</td>
                            <td>{{ $hasil->jurusanRekomendasi->nama_jurusan }}</td>
                            <td>{{ $hasil->persentase }}%</td>
                            <td>{{ $hasil->tanggal_tes->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $hasilTes->links() }}
    @endif
</div>

@endsection