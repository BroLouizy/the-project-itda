@extends('layouts.student')

@section('title', 'Pengaturan Profil')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card p-4 shadow-sm border-0" style="border-radius: 12px; max-width: 700px;">

    <h5 class="mb-4">Pengaturan Profil</h5>

    <form method="POST" action="{{ route('student.setting.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center mb-4">
            <img
                src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=120&background=2c5cf5&color=fff' }}"
                alt="Foto Profil"
                style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #eaf0ff;"
            >
            <div class="mt-3">
                <label class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-camera me-1"></i> Ganti Foto
                    <input type="file" name="photo" accept="image/*" style="display: none;" onchange="this.form.submit()">
                </label>
            </div>
            @error('photo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
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

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
        </button>
    </form>

</div>

@endsection