@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')

{{-- BREADCRUMB --}}
<div class="mb-3">
    <a href="{{ route('admin.siswa.index') }}" class="text-decoration-none text-muted" style="font-size: 13.5px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Kelola Siswa
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden; width: 100%;">

    {{-- HEADER CARD --}}
    <div class="edit-header-bg">
        <div class="edit-avatar">
            @if ($siswa->profile_photo)
                <img src="{{ asset('storage/' . $siswa->profile_photo) }}"
                    alt="{{ $siswa->name }}"
                    style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            @else
                {{ strtoupper(substr($siswa->name, 0, 1)) }}
            @endif
        </div>
        <div>
            <h5 class="mb-0 text-white">{{ $siswa->name }}</h5>
            <p class="text-white-50 mb-0" style="font-size: 13px;">Edit informasi data siswa</p>
        </div>
    </div>

    <div class="p-4 p-md-5">

        <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
            @csrf
            @method('PUT')

            {{-- SECTION: DATA PRIBADI --}}
            <div class="section-label">
                <i class="fa-solid fa-id-card"></i> Data Pribadi
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $siswa->name) }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $siswa->email) }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $siswa->phone) }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- SECTION: DATA SEKOLAH --}}
            <div class="section-label mt-4">
                <i class="fa-solid fa-school"></i> Data Sekolah
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="school_name" class="form-control" value="{{ old('school_name', $siswa->school_name) }}">
                @error('school_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="province" class="form-control" value="{{ old('province', $siswa->province) }}">
                    @error('province') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tipe Sekolah</label>
                    <select name="school_type" class="form-select">
                        @foreach (['SMA', 'SMK', 'MA', 'MAK'] as $type)
                            <option value="{{ $type }}" {{ old('school_type', $siswa->school_type) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    @error('school_type') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="class_level" class="form-select">
                        @foreach (['X', 'XI', 'XII'] as $level)
                            <option value="{{ $level }}" {{ old('class_level', $siswa->class_level) == $level ? 'selected' : '' }}>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_level') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Jurusan Asal (SMA/SMK)</label>
                <input type="text" name="major" class="form-control" value="{{ old('major', $siswa->major) }}">
                @error('major') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </form>

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

    .section-label {
        font-size: 13px;
        font-weight: 700;
        color: #173b70;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid #eaf0ff;
    }

    .section-label i {
        margin-right: 6px;
    }
</style>

@endsection