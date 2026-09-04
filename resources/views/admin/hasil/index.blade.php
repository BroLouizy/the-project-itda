@extends('layouts.admin')

@section('title', 'Hasil Tes Siswa')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Hasil Tes Siswa</h4>
        <p class="text-muted mb-0" style="font-size: 14px;">
            Daftar siswa yang telah menyelesaikan tes minat & bakat
        </p>
    </div>
    <div class="stat-mini">
        <i class="fa-solid fa-chart-simple"></i>
        <span>{{ $hasilTes->total() }} Hasil Tes</span>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">

    <div class="p-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 fw-bold">Daftar Hasil Tes</h6>
            <form method="GET" class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search"
                       placeholder="Cari nama atau sekolah..."
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>

    @if ($hasilTes->isEmpty())
        <div class="text-center py-5">
            <div class="mx-auto rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3"
                 style="width: 90px; height: 90px;">
                <i class="fa-solid fa-clipboard-question text-primary" style="font-size: 36px;"></i>
            </div>
            <h6 class="fw-semibold mb-1">Belum Ada Hasil Tes</h6>
            <p class="text-muted mb-0" style="max-width: 340px; margin: 0 auto;">
                Data akan muncul di sini setelah ada siswa yang menyelesaikan tes minat & bakat.
            </p>
        </div>
    @else
        <div class="table-responsive px-2 pb-2">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-muted small">SISWA</th>
                        <th class="text-muted small">SEKOLAH</th>
                        <th class="text-muted small">REKOMENDASI JURUSAN</th>
                        <th class="text-muted small">PERSENTASE</th>
                        <th class="text-muted small">TANGGAL TES</th>
                        <th class="text-muted small text-end">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilTes as $hasil)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="student-avatar">
                                        @if ($hasil->user->profile_photo)
                                            <img src="{{ asset('storage/' . $hasil->user->profile_photo) }}"
                                                 alt="{{ $hasil->user->name }}"
                                                 style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                                        @else
                                            {{ strtoupper(substr($hasil->user->name, 0, 1)) }}
                                        @endif
                                    </div>
                                    <span class="fw-semibold">{{ $hasil->user->name }}</span>
                                </div>
                            </td>
                            <td style="font-size: 13.5px;">{{ $hasil->user->school_name }}</td>
                            <td style="font-size: 13.5px;">{{ $hasil->jurusanRekomendasi->nama_jurusan }}</td>
                            <td>
                                <span class="badge-persen">{{ $hasil->persentase }}%</span>
                            </td>
                            <td style="font-size: 13.5px;">{{ $hasil->tanggal_tes->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.hasil.show', $hasil->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-chart-simple"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 pb-4">
            {{ $hasilTes->links() }}
        </div>
    @endif

</div>

<style>
    .stat-mini {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #eaf0ff;
        color: #173b70;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 13.5px;
        font-weight: 600;
    }

    .search-box {
        position: relative;
        width: 280px;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        padding: 9px 14px 9px 38px;
        border: 1.5px solid #e2e6ee;
        border-radius: 30px;
        font-size: 13.5px;
        background: #f9fafc;
        transition: 0.2s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #2c5cf5;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(44, 92, 245, 0.1);
    }

    .student-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #173b70, #2c5cf5);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        flex-shrink: 0;
        overflow: hidden;
    }

    .badge-persen {
        background: #eaf0ff;
        color: #173b70;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }
</style>

@endsection