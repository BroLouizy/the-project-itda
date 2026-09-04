@extends('layouts.student')

@section('title', 'Hasil Tes')

@section('content')

@php
    $kategori = function ($persen) {
        if ($persen >= 80) return ['Sangat Tinggi', '#198754'];
        if ($persen >= 65) return ['Tinggi', '#0d9488'];
        if ($persen >= 50) return ['Sedang', '#b8720a'];
        if ($persen >= 35) return ['Rendah', '#dc3545'];
        return ['Sangat Rendah', '#6c757d'];
    };
@endphp

<h4 class="fw-bold mb-4">Hasil Tes Minat & Bakat</h4>

<div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 16px;">
    <p class="text-muted mb-1">Rekomendasi Utama</p>
    <h2 class="fw-bold text-primary mb-0">{{ $hasil->jurusanRekomendasi->nama_jurusan }}</h2>
    <p class="text-muted mb-0">Skor kecocokan: {{ $hasil->persentase }}%</p>
</div>

<div class="card border-0 shadow-sm p-4" style="border-radius: 16px;">
    <h6 class="fw-bold mb-3">Detail Skor Semua Jurusan</h6>

    @foreach ($detailSkor as $i => $d)
        @php [$label, $color] = $kategori($d['persentase']); @endphp

        <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
                <span>{{ $i + 1 }}. {{ $d['nama_jurusan'] }}</span>
                <span style="color: {{ $color }}; font-weight:700;">{{ $d['persentase'] }}% — {{ $label }}</span>
            </div>
            <div class="progress" style="height: 8px; border-radius: 10px;">
                <div class="progress-bar" style="width: {{ $d['persentase'] }}%; background: {{ $color }}; border-radius: 10px;"></div>
            </div>
        </div>
    @endforeach
</div>

@endsection