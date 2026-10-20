@extends('layouts.admin')

@section('title', 'Kelola Siswa')

@section('content')

@if (session('success'))
    <div id="toast-success" class="toast-notification toast-success">

        <div class="toast-icon">
            <i class="fa-solid fa-check"></i>
        </div>

        <div class="toast-content">
            <strong>Berhasil!</strong>
            <span>{{ session('success') }}</span>
        </div>

        <button type="button"
                class="toast-close"
                onclick="closeToast()">
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- HEADER HALAMAN --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Kelola Siswa</h4>
        <p class="text-muted mb-0" style="font-size: 14px;">
            Kelola data siswa yang telah mendaftar di SIMPRODI
        </p>
    </div>
    <div class="stat-mini">
        <i class="fa-solid fa-users"></i>
        <span>{{ $siswa->total() }} Siswa Terdaftar</span>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">

    <div class="p-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 fw-bold">Daftar Siswa</h6>
            <form method="GET" class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search"
                       placeholder="Cari nama, email, atau sekolah..."
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>

    @if ($siswa->isEmpty())
        <div class="text-center py-5">
            <div class="mx-auto rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3"
                 style="width: 90px; height: 90px;">
                <i class="fa-solid fa-user-slash text-primary" style="font-size: 36px;"></i>
            </div>
            <h6 class="fw-semibold mb-1">Belum Ada Siswa Terdaftar</h6>
            <p class="text-muted mb-0" style="max-width: 340px; margin: 0 auto;">
                Data siswa akan muncul di sini setelah ada yang mendaftar akun.
            </p>
        </div>
    @else
        <div class="table-responsive px-2 pb-2">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-muted small">SISWA</th>
                        <th class="text-muted small">KONTAK</th>
                        <th class="text-muted small">SEKOLAH</th>
                        <th class="text-muted small">TIPE</th>
                        <th class="text-muted small">KELAS</th>
                        <th class="text-muted small">PROVINSI</th>
                        <th class="text-muted small text-end">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="student-avatar">
                                        @if ($s->profile_photo)
                                            <img src="{{ asset('storage/' . $s->profile_photo) }}"
                                                 alt="{{ $s->name }}"
                                                 style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                                        @else
                                            {{ strtoupper(substr($s->name, 0, 1)) }}
                                        @endif
                                    </div>
                                    <span class="fw-semibold">{{ $s->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 13.5px;">{{ $s->email }}</div>
                                <div class="text-muted" style="font-size: 12.5px;">{{ $s->phone }}</div>
                            </td>
                            <td style="font-size: 13.5px;">{{ $s->school_name }}</td>
                            <td>
                                <span class="badge-type">{{ $s->school_type }}</span>
                            </td>
                            <td>
                                <span class="badge-class">{{ $s->class_level }}</span>
                            </td>
                            <td style="font-size: 13.5px;">{{ $s->province }}</td>
                            <td class="text-end">

                                {{-- Download sertifikat (hanya aktif kalau siswa sudah tes) --}}
                                @if ($s->tes_results_count > 0)
                                    <a href="{{ route('admin.siswa.sertifikat', $s->id) }}"
                                       class="btn btn-sm btn-outline-success"
                                       title="Download Sertifikat">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                @else
                                    <button type="button"
                                            class="btn btn-sm btn-outline-secondary"
                                            title="Belum mengerjakan tes"
                                            disabled>
                                        <i class="fa-solid fa-download"></i>
                                    </button>
                                @endif

                                <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 pb-4">
            {{ $siswa->links() }}
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

    .badge-type {
        background: #fff4e5;
        color: #b8720a;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-class {
        background: #eaf0ff;
        color: #173b70;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .table > :not(caption) > * > * {
        border-bottom-color: #f0f2f5;
    }
</style>

@endsection