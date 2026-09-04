@extends('layouts.admin')

@section('title', 'Edit Soal')

@section('content')

<div class="mb-3">
    <a href="{{ route('admin.pertanyaan.index') }}" class="text-decoration-none text-muted" style="font-size: 13.5px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Kelola Pertanyaan
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

    <div class="edit-header-bg">
        <div>
            <h5 class="mb-0 text-white">Soal Nomor {{ $pertanyaan->nomor_urut }}</h5>
            <p class="text-white-50 mb-0" style="font-size: 13px;">Edit teks, gambar jawaban, dan jurusan tujuan</p>
        </div>
    </div>

    <div class="p-4 p-md-5">

        <form method="POST" action="{{ route('admin.pertanyaan.update', $pertanyaan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label">Teks Pertanyaan</label>
                <textarea name="teks_pertanyaan" class="form-control" rows="2">{{ old('teks_pertanyaan', $pertanyaan->teks_pertanyaan) }}</textarea>
                @error('teks_pertanyaan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="section-label">
                <i class="fa-solid fa-image"></i> Opsi Jawaban
            </div>

            <div class="row g-3">
                @foreach ($pertanyaan->opsiJawabans->sortBy('label') as $opsi)
                    <div class="col-md-6">
                        <div class="opsi-card">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="opsi-label-badge">{{ $opsi->label }}</span>
                                <span class="fw-semibold" style="font-size: 13.5px;">Pilihan {{ $opsi->label }}</span>
                            </div>

                            <img src="{{ asset('storage/' . $opsi->gambar_opsi) }}"
                                 alt="Pilihan {{ $opsi->label }}"
                                 class="opsi-preview mb-2">

                            <div class="mb-2">
                                <label class="form-label" style="font-size: 12.5px;">Ganti Gambar (opsional)</label>
                                <input type="file" name="opsi[{{ $opsi->id }}][gambar]" class="form-control form-control-sm" accept="image/*">
                                @error("opsi.{$opsi->id}.gambar") <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div>
                                <label class="form-label" style="font-size: 12.5px;">Jurusan Tujuan</label>
                                <select name="opsi[{{ $opsi->id }}][jurusan_kuliah_id]" class="form-select form-select-sm">
                                    @foreach ($jurusanList as $jurusan)
                                        <option value="{{ $jurusan->id }}"
                                            {{ $opsi->jurusan_kuliah_id == $jurusan->id ? 'selected' : '' }}>
                                            {{ $jurusan->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary px-4 mt-4">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
            </button>

        </form>

    </div>

</div>

<style>
    .edit-header-bg {
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

    .opsi-card {
        border: 1.5px solid #e2e6ee;
        border-radius: 12px;
        padding: 16px;
        height: 100%;
    }

    .opsi-label-badge {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, #173b70, #2c5cf5);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
    }

    .opsi-preview {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2e6ee;
    }
</style>

@endsection