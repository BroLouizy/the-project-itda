@extends('layouts.admin')

@section('title', 'Detail Hasil Tes')

@section('content')

@php
    $kategoriFn = function ($persen) {
        if ($persen >= 80) return ['Sangat Tinggi', '#198754'];
        if ($persen >= 65) return ['Tinggi', '#0d9488'];
        if ($persen >= 50) return ['Sedang', '#b8720a'];
        if ($persen >= 35) return ['Rendah', '#dc3545'];
        return ['Sangat Rendah', '#6c757d'];
    };

    [$labelUtama, $colorUtama] = $kategoriFn($hasil->persentase);

    $dataJurusanJs = [];
    foreach ($detailSkor as $d) {
        $warna = $kategoriFn($d['persentase'])[1];
        $dataJurusanJs[] = [
            'nama' => $d['nama_jurusan'],
            'skor' => $d['persentase'],
            'warna' => $warna,
        ];
    }
@endphp

<div class="mb-3">
    <a href="{{ route('admin.hasil.index') }}" class="text-decoration-none text-muted" style="font-size: 13.5px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Hasil Tes Siswa
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

    <div class="edit-header-bg">
        <div class="edit-avatar">
            @if ($hasil->user->profile_photo)
                <img src="{{ asset('storage/' . $hasil->user->profile_photo) }}"
                     alt="{{ $hasil->user->name }}"
                     style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            @else
                {{ strtoupper(substr($hasil->user->name, 0, 1)) }}
            @endif
        </div>
        <div>
            <h5 class="mb-0 text-white">{{ $hasil->user->name }}</h5>
            <p class="text-white-50 mb-0" style="font-size: 13px;">
                {{ $hasil->user->school_name }} &middot; Tes pada {{ $hasil->tanggal_tes->format('d M Y') }}
            </p>
        </div>
    </div>

    <div class="p-4 p-md-5">

        {{-- BAGIAN ATAS: DONUT SKOR UTAMA + INFO --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-4 text-center">
                <div style="position: relative; max-width: 220px; margin: 0 auto;">
                    <canvas id="donutSkorUtama"></canvas>
                    <div class="donut-center-text">
                        <div class="donut-percent">{{ $hasil->persentase }}%</div>
                        <div class="donut-label">Kecocokan</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p class="text-muted mb-1">Rekomendasi Utama</p>
                <h3 class="fw-bold text-primary mb-2">{{ $hasil->jurusanRekomendasi->nama_jurusan }}</h3>
                <span class="badge-kategori" style="background: {{ $colorUtama }}1a; color: {{ $colorUtama }};">
                    {{ $labelUtama }}
                </span>
            </div>
        </div>

        {{-- BAGIAN BAWAH: BAR CHART SEMUA JURUSAN --}}
        <h6 class="fw-bold mb-3">Breakdown Skor Semua Jurusan</h6>
        <div style="height: {{ count($detailSkor) * 42 }}px;">
            <canvas id="barChartJurusan"></canvas>
        </div>

    </div>

</div>

<style>
    .edit-header-bg {
        background: linear-gradient(135deg, #173b70, #2c5cf5);
        padding: 24px 32px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .edit-avatar {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        overflow: hidden;
    }

    .donut-center-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .donut-percent {
        font-size: 28px;
        font-weight: 800;
        color: #173b70;
        line-height: 1;
    }

    .donut-label {
        font-size: 12px;
        color: #888;
        margin-top: 4px;
    }

    .badge-kategori {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    // ===== DONUT CHART - SKOR UTAMA =====
    const donutCtx = document.getElementById('donutSkorUtama').getContext('2d');
    new Chart(donutCtx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [{{ $hasil->persentase }}, {{ 100 - $hasil->persentase }}],
                backgroundColor: ['{{ $colorUtama }}', '#f0f2f5'],
                borderWidth: 0,
            }]
        },
        options: {
            cutout: '75%',
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
            }
        }
    });

    // ===== BAR CHART - SEMUA JURUSAN =====
    const dataJurusan = @json($dataJurusanJs);

    const barCtx = document.getElementById('barChartJurusan').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: dataJurusan.map(d => d.nama),
            datasets: [{
                data: dataJurusan.map(d => d.skor),
                backgroundColor: dataJurusan.map(d => d.warna),
                borderRadius: 6,
                barThickness: 22,
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: (ctx) => ctx.parsed.x + '%'
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    ticks: { callback: (val) => val + '%' },
                    grid: { color: '#f0f2f5' }
                },
                y: {
                    grid: { display: false }
                }
            }
        }
    });
</script>

@endsection