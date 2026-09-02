@extends('layouts.student')

@section('title', 'Pengaturan Profil')

@section('content')

@if (session('success'))
    <div class="alert-custom alert-custom-success mb-4">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

    {{-- HEADER CARD --}}
    <div class="profile-header-bg">
        <h5 class="mb-0 text-white">
            <i class="fa-solid fa-user-gear me-2"></i>
            Pengaturan Profil
        </h5>
        <p class="text-white-50 mb-0 mt-1" style="font-size: 13.5px;">
            Kelola informasi akun dan data diri kamu
        </p>
    </div>

    <div class="p-4 p-md-5">

        <form method="POST" action="{{ route('student.setting.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- FOTO PROFIL --}}
            <div class="text-center mb-5">
                <label class="photo-upload-wrapper" style="cursor: pointer;">
                    <img
                        src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=140&background=2c5cf5&color=fff' }}"
                        alt="Foto Profil"
                        class="photo-preview"
                    >
                    <div class="photo-overlay">
                        <i class="fa-solid fa-camera"></i>
                        <span>Ganti Foto</span>
                    </div>
                    <input type="file" name="photo" accept="image/*" style="display: none;" onchange="this.form.submit()">
                </label>
                <p class="text-muted mt-3 mb-0" style="font-size: 13px;">
                    Klik foto untuk mengganti. Format JPG/PNG, maks. 2MB.
                </p>
                @error('photo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- SECTION: DATA PRIBADI --}}
            <div class="section-label">
                <i class="fa-solid fa-id-card"></i> Data Pribadi
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- SECTION: DATA SEKOLAH --}}
            <div class="section-label mt-4">
                <i class="fa-solid fa-school"></i> Data Sekolah
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="school_name" class="form-control" value="{{ old('school_name', $user->school_name) }}">
                @error('school_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="province" class="form-control" value="{{ old('province', $user->province) }}">
                    @error('province') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tipe Sekolah</label>
                    <select name="school_type" class="form-select">
                        @foreach (['SMA', 'SMK', 'MA', 'MAK'] as $type)
                            <option value="{{ $type }}" {{ old('school_type', $user->school_type) == $type ? 'selected' : '' }}>
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
                            <option value="{{ $level }}" {{ old('class_level', $user->class_level) == $level ? 'selected' : '' }}>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_level') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Jurusan</label>
                <input type="text" name="major" class="form-control" value="{{ old('major', $user->major) }}">
                @error('major') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary px-4">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
            </button>
        </form>

    </div>

</div>

<style>
    .profile-header-bg {
        background: linear-gradient(135deg, #173b70, #2c5cf5);
        padding: 24px 32px;
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

    .photo-upload-wrapper {
        position: relative;
        display: inline-block;
        border-radius: 50%;
    }

    .photo-preview {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #eaf0ff;
        display: block;
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(23, 59, 112, 0.75);
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        font-size: 12px;
        font-weight: 600;
        opacity: 0;
        transition: 0.2s;
    }

    .photo-overlay i {
        font-size: 20px;
    }

    .photo-upload-wrapper:hover .photo-overlay {
        opacity: 1;
    }

    .alert-custom {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 18px;
        border-radius: 10px;
        font-size: 14px;
    }

    .alert-custom-success {
        background: #e8f7ec;
        color: #187a35;
        border-left: 4px solid #187a35;
    }

    .alert-custom i {
        font-size: 16px;
    }
</style>

@endsection