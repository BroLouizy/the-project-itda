@extends('layouts.student')

@section('title', 'Dashboard Siswa')

@section('content')

@if ($sudahTes)
    <div class="card p-4 shadow-sm border-0" style="border-radius: 12px;">
        <h5 class="mb-3"><i class="fa-solid fa-chart-simple text-success"></i> Hasil Tes Kamu</h5>
        <h3 class="text-primary">{{ $hasilTerakhir->jurusanRekomendasi->nama_jurusan }}</h3>
        <div class="progress mb-2" style="height: 25px;">
            <div class="progress-bar bg-success" style="width: {{ $hasilTerakhir->persentase }}%">
                {{ $hasilTerakhir->persentase }}%
            </div>
        </div>
        <p class="text-muted mb-0">Tingkat kecocokan dengan jurusan ini.</p>
    </div>
@else
    <div class="card p-4 text-center shadow-sm border-0" style="border-radius: 12px;">
        <i class="fa-solid fa-clipboard-question fa-3x text-primary mb-3"></i>
        <h5>Kamu Belum Mengikuti Tes Minat Bakat</h5>
        <p class="text-muted">Yuk cari tahu jurusan kuliah yang paling cocok dengan minat dan bakatmu!</p>
        <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}" class="btn btn-primary btn-lg mt-2"> 
            <i class="fa-solid fa-play me-1"></i> Mulai Tes Sekarang
        </a>
    </div>
@endif

@endsection