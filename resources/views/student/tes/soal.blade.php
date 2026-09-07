@extends('layouts.student')

@section('title', 'Tes Minat & Bakat')

@section('content')

<div class="mb-4">

    <div class="d-flex justify-content-between align-items-center mb-2">

        <h5 class="fw-bold mb-0">
            Soal {{ $nomor }} dari {{ $total }}
        </h5>

        <span class="text-muted small">
            {{ round(($nomor / $total) * 100) }}%
        </span>

    </div>

    <div class="progress"
         style="height: 10px; border-radius: 20px;">

        <div class="progress-bar"
             role="progressbar"
             style="
                width: {{ ($nomor / $total) * 100 }}%;
                background: linear-gradient(135deg, #173b70, #2c5cf5);
                border-radius: 20px;
             ">
        </div>

    </div>

</div>


{{-- =====================================================
    KARTU SOAL
===================================================== --}}

<div class="card border-0 shadow-sm p-4 p-md-5"
     style="border-radius: 16px;">

    <h4 class="fw-bold text-center mb-4">
        {{ $pertanyaan->teks_pertanyaan }}
    </h4>


    {{-- =====================================================
        PILIHAN JAWABAN
    ====================================================== --}}

    <div class="row g-3">

        @foreach ($pertanyaan->opsiJawabans->sortBy('label') as $opsi)

            <div class="col-md-6">

                <form method="POST"
                      action="{{ route('tes.jawab', $nomor) }}">

                    @csrf

                    <input type="hidden"
                           name="opsi_id"
                           value="{{ $opsi->id }}">


                    <button type="submit"
                            class="option-card {{ $jawabanTerpilih == $opsi->id ? 'option-selected' : '' }}">

                        {{-- LABEL A / B / C / D --}}
                        <span class="option-label">
                            {{ $opsi->label }}
                        </span>


                        {{-- GAMBAR PILIHAN --}}
                        <img src="{{ asset('storage/' . $opsi->gambar_opsi) }}"
                             alt="Pilihan {{ $opsi->label }}">

                    </button>

                </form>

            </div>

        @endforeach

    </div>

</div>


<style>

/* =====================================================
   OPTION CARD
===================================================== */

.option-card {

    width: 100%;

    border: 2px solid #e2e6ee;

    border-radius: 14px;

    padding: 10px;

    background: #fff;

    cursor: pointer;

    display: flex;

    align-items: center;

    gap: 12px;

    transition: all 0.2s ease;

    text-align: left;

    overflow: hidden;

}


/* =====================================================
   HOVER
===================================================== */

.option-card:hover {

    border-color: #2c5cf5;

    box-shadow: 0 4px 14px rgba(44, 92, 245, 0.12);

    transform: translateY(-1px);

}


/* =====================================================
   PILIHAN TERPILIH
===================================================== */

.option-selected {

    border-color: #2c5cf5;

    background: #eaf0ff;

}


/* =====================================================
   LABEL A B C D
===================================================== */

.option-label {

    width: 38px;

    height: 38px;

    min-width: 38px;

    border-radius: 50%;

    background: linear-gradient(
        135deg,
        #173b70,
        #2c5cf5
    );

    color: #fff;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 700;

    font-size: 15px;

    flex-shrink: 0;

}


/* =====================================================
   GAMBAR PILIHAN
===================================================== */

.option-card img {

    display: block;

    /*
     * Lebar mengikuti ruang yang tersedia.
     */
    width: 100%;

    /*
     * Tinggi otomatis mengikuti rasio asli gambar.
     */
    height: auto;

    /*
     * Tidak memotong gambar.
     */
    object-fit: contain;

    border-radius: 8px;

    /*
     * Membuat gambar mengambil sisa
     * ruang setelah label A/B/C/D.
     */
    flex: 1;

    min-width: 0;

}


/* =====================================================
   RESPONSIVE MOBILE
===================================================== */

@media (max-width: 767.98px) {

    .option-card {

        padding: 8px;

        gap: 10px;

    }


    .option-label {

        width: 34px;

        height: 34px;

        min-width: 34px;

        font-size: 14px;

    }

}

</style>

@endsection