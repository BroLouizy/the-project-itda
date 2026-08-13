@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')

<div class="card p-4 shadow-sm border-0" style="border-radius: 12px; max-width: 600px;">
    <h5 class="mb-3">Edit Data Siswa</h5>

    <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $siswa->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $siswa->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">No. HP</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $siswa->phone) }}">
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
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

        <div class="mb-3">
            <label class="form-label">Jurusan Asal (SMA/SMK)</label>
            <input type="text" name="major" class="form-control" value="{{ old('major', $siswa->major) }}">
            @error('major') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection