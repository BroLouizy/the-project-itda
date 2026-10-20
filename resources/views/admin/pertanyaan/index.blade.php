@extends('layouts.admin')

@section('title', 'Kelola Pertanyaan')

@section('content')

@if (session('success'))
    <div id="toast-success" class="toast-notification toast-success">
        <div class="toast-icon"><i class="fa-solid fa-check"></i></div>
        <div class="toast-content">
            <strong>Berhasil!</strong>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" class="toast-close" onclick="closeToast()">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Pertanyaan</h4>
        <p class="text-muted mb-0" style="font-size: 14px;">
            Kelola gambar jawaban dan pemetaan jurusan untuk tiap soal tes
        </p>
    </div>
    <div class="stat-mini">
        <i class="fa-solid fa-clipboard-question"></i>
        <span>{{ $pertanyaans->total() }} Soal</span>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="table-responsive px-2 pt-2">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="text-muted small" style="width: 80px;">NO</th>
                    <th class="text-muted small">PERTANYAAN</th>
                    <th class="text-muted small">PRATINJAU JAWABAN</th>
                    <th class="text-muted small text-end">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertanyaans as $p)
                    <tr>
                        <td class="fw-bold">#{{ $p->nomor_urut }}</td>
                        <td style="font-size: 13.5px; max-width: 280px;">{{ $p->teks_pertanyaan }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @foreach ($p->opsiJawabans->sortBy('label') as $opsi)
                                    <img src="{{ asset('storage/' . $opsi->gambar_opsi) }}"
                                         alt="{{ $opsi->label }}"
                                         class="mini-preview"
                                         title="{{ $opsi->label }}: {{ $opsi->jurusanKuliah->nama_jurusan ?? '-' }}">
                                @endforeach
                            </div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.pertanyaan.edit', $p->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 pb-4 pt-2">
    {{ $pertanyaans->onEachSide(2)->links('pagination::bootstrap-5') }}
</div>
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
    .mini-preview {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
        border: 1.5px solid #e2e6ee;
    }
    
            
        /* Perbaikan ikon navigasi pagination Laravel */
        nav[role="navigation"] svg,
        .pagination svg {
            width: 16px !important;
            height: 16px !important;
            max-width: 16px !important;
            max-height: 16px !important;
            display: inline-block !important;
            flex-shrink: 0 !important;
        }

        /* Rapikan tombol pagination */
        nav[role="navigation"] a,
        nav[role="navigation"] button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Cegah ikon SVG melebar mengikuti container */
        nav[role="navigation"] a svg,
        nav[role="navigation"] button svg {
            width: 16px !important;
            height: 16px !important;
        }

</style>

@endsection