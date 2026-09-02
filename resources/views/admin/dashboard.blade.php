@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-4 shadow-sm border-0" style="border-radius: 14px;">
            <div class="d-flex align-items-center">
                <div class="rounded-3 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                     style="width: 54px; height: 54px;">
                    <i class="fa-solid fa-users text-primary fs-4"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $totalSiswa }}</h3>
                    <small class="text-muted">Total Siswa Terdaftar</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-4 shadow-sm border-0" style="border-radius: 14px;">
    <h5 class="mb-3">Hasil Tes Terbaru</h5>

    @if ($hasilTes->isEmpty())
        <div class="text-center py-5">
            <div class="mx-auto rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3"
                 style="width: 90px; height: 90px;">
                <i class="fa-solid fa-clipboard-question text-primary" style="font-size: 38px;"></i>
            </div>
            <h6 class="fw-semibold mb-1">Belum Ada Hasil Tes</h6>
            <p class="text-muted mb-0" style="max-width: 360px; margin: 0 auto;">
                Data akan muncul di sini setelah ada siswa yang menyelesaikan tes minat & bakat.
            </p>
        </div>
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