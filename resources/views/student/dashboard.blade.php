@extends('layouts.student')

@section('title', 'Home Siswa')

@section('content')

{{-- =========================================================
    HOME SISWA
========================================================= --}}

<div class="container-fluid px-0">

    {{-- HEADER SAPAAN --}}
    <div class="mb-4">
        <span class="text-muted small">
            <i class="fa-solid fa-house me-1"></i> HOME
        </span>

        <h2 class="fw-bold mt-2 mb-1">
            Selamat Datang, {{ $user->name ?? 'Siswa' }}! 👋
        </h2>

        <p class="text-muted mb-0">
            Kenali minat dan potensimu untuk menemukan pilihan jurusan yang lebih sesuai.
        </p>
    </div>


    {{-- =====================================================
        JIKA SUDAH TES
    ====================================================== --}}
    @if ($sudahTes)

        <div class="card border-0 shadow-sm overflow-hidden mb-4"
             style="border-radius: 20px;">

            <div class="card-body p-4 p-md-5">

                <div class="row align-items-center">

                    {{-- INFO HASIL --}}
                    <div class="col-lg-7">

                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-success bg-opacity-10
                                        d-flex align-items-center justify-content-center me-3"
                                 style="width: 55px; height: 55px;">
                                <i class="fa-solid fa-graduation-cap text-success fs-4"></i>
                            </div>

                            <div>
                                <small class="text-muted d-block">
                                    HASIL TES TERAKHIR
                                </small>
                                <h4 class="fw-bold mb-0">
                                    Hasil Tes Minat & Bakat
                                </h4>
                            </div>
                        </div>

                        <p class="text-muted mb-2">
                            Rekomendasi jurusan yang paling sesuai dengan hasil tes kamu:
                        </p>

                        <h2 class="fw-bold text-primary mb-4">
                            {{ $hasilTerakhir->jurusanRekomendasi->nama_jurusan }}
                        </h2>

                        {{-- PROGRESS --}}
                        <div class="mb-2 d-flex justify-content-between">
                            <span class="text-muted">
                                Tingkat Kecocokan
                            </span>

                            <strong class="text-success">
                                {{ $hasilTerakhir->persentase }}%
                            </strong>
                        </div>

                        <div class="progress mb-4"
                             style="height: 14px; border-radius: 20px;">

                            <div class="progress-bar bg-success"
                                 role="progressbar"
                                 style="width: {{ $hasilTerakhir->persentase }}%; border-radius: 20px;"
                                 aria-valuenow="{{ $hasilTerakhir->persentase }}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                            </div>

                        </div>

                        <div class="d-flex flex-wrap gap-2">

                            {{-- Tombol hasil --}}
                            @if (Route::has('hasil.index'))
                                <a href="{{ route('hasil.index') }}"
                                   class="btn btn-primary px-4">

                                    <i class="fa-solid fa-chart-simple me-2"></i>
                                    Lihat Hasil
                                </a>
                            @endif

                            {{-- Tombol PDF akan kita aktifkan di tahap PDF --}}
                            @if (Route::has('hasil.pdf'))
                                <a href="{{ route('hasil.pdf') }}"
                                   class="btn btn-outline-danger px-4">

                                    <i class="fa-solid fa-file-pdf me-2"></i>
                                    Download PDF
                                </a>
                            @endif

                        </div>

                    </div>


                    {{-- ICON / ILUSTRASI --}}
                    <div class="col-lg-5 text-center mt-4 mt-lg-0">

                        <div class="mx-auto rounded-4 bg-success bg-opacity-10
                                    d-flex align-items-center justify-content-center"
                             style="width: 190px; height: 190px;">

                            <i class="fa-solid fa-award text-success"
                               style="font-size: 90px;">
                            </i>

                        </div>

                        <p class="text-muted mt-3 mb-0">
                            Kamu sudah menyelesaikan tes! 🎉
                        </p>

                    </div>

                </div>

            </div>
        </div>


    {{-- =====================================================
        JIKA BELUM TES
    ====================================================== --}}
    @else

        <div class="card border-0 shadow-sm overflow-hidden mb-4"
             style="border-radius: 20px;">

            <div class="card-body p-4 p-md-5">

                <div class="row align-items-center">

                    {{-- TEXT --}}
                    <div class="col-lg-7">

                        <span class="badge bg-primary bg-opacity-10
                                     text-primary px-3 py-2 mb-3"
                              style="border-radius: 20px;">

                            <i class="fa-solid fa-brain me-1"></i>
                            TES MINAT & BAKAT
                        </span>

                        <h1 class="fw-bold mb-3">
                            Kenali Dirimu,
                            <span class="text-primary">Temukan Potensimu.</span>
                        </h1>

                        <p class="text-muted fs-5 mb-4">
                            Cari tahu minat, potensi, dan bidang yang paling sesuai
                            dengan dirimu untuk membantu menentukan pilihan jurusan kuliah.
                        </p>

                        <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}"
                           class="btn btn-primary btn-lg px-4 py-3"
                           style="border-radius: 12px;">

                            <i class="fa-solid fa-play me-2"></i>
                            Mulai Tes Sekarang

                        </a>

                    </div>


                    {{-- ICON --}}
                    <div class="col-lg-5 text-center mt-4 mt-lg-0">

                        <div class="mx-auto rounded-circle bg-primary bg-opacity-10
                                    d-flex align-items-center justify-content-center"
                             style="width: 210px; height: 210px;">

                            <i class="fa-solid fa-brain text-primary"
                               style="font-size: 100px;">
                            </i>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    @endif


    {{-- =====================================================
        TENTANG TES
    ====================================================== --}}

    <div class="text-center mb-4 mt-5">

        <span class="text-primary fw-semibold">
            TENTANG TES
        </span>

        <h3 class="fw-bold mt-2">
            Kenapa Kamu Perlu Mengikuti Tes?
        </h3>

        <p class="text-muted mx-auto"
           style="max-width: 650px;">

            Tes ini membantu kamu mengenali minat dan potensi diri
            sebagai salah satu pertimbangan dalam memilih jurusan kuliah.

        </p>

    </div>


    {{-- =====================================================
        CARA MENGIKUTI TES
    ====================================================== --}}

    <div class="row g-4 mb-5">

        {{-- STEP 1 --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow-sm text-center p-4"
                 style="border-radius: 16px;">

                <div class="rounded-circle bg-primary bg-opacity-10
                            d-flex align-items-center justify-content-center
                            mx-auto mb-3"
                     style="width: 70px; height: 70px;">

                    <i class="fa-solid fa-clipboard-list text-primary fs-3"></i>

                </div>

                <h5 class="fw-bold">
                    Jawab Soal
                </h5>

                <p class="text-muted mb-0">
                    Jawab pertanyaan berdasarkan aktivitas dan hal-hal
                    yang kamu sukai.
                </p>

            </div>

        </div>


        {{-- STEP 2 --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow-sm text-center p-4"
                 style="border-radius: 16px;">

                <div class="rounded-circle bg-warning bg-opacity-10
                            d-flex align-items-center justify-content-center
                            mx-auto mb-3"
                     style="width: 70px; height: 70px;">

                    <i class="fa-solid fa-brain text-warning fs-3"></i>

                </div>

                <h5 class="fw-bold">
                    Analisis Jawaban
                </h5>

                <p class="text-muted mb-0">
                    Sistem akan menganalisis jawabanmu untuk mengetahui
                    bidang minat yang paling dominan.
                </p>

            </div>

        </div>


        {{-- STEP 3 --}}
        <div class="col-md-4">

            <div class="card h-100 border-0 shadow-sm text-center p-4"
                 style="border-radius: 16px;">

                <div class="rounded-circle bg-success bg-opacity-10
                            d-flex align-items-center justify-content-center
                            mx-auto mb-3"
                     style="width: 70px; height: 70px;">

                    <i class="fa-solid fa-graduation-cap text-success fs-3"></i>

                </div>

                <h5 class="fw-bold">
                    Lihat Hasil
                </h5>

                <p class="text-muted mb-0">
                    Dapatkan rekomendasi jurusan yang sesuai dengan
                    hasil tes minat dan bakatmu.
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
        APA YANG DIDAPATKAN
    ====================================================== --}}

    <div class="text-center mb-4">

        <span class="text-primary fw-semibold">
            MANFAAT TES
        </span>

        <h3 class="fw-bold mt-2">
            Apa yang Akan Kamu Dapatkan?
        </h3>

    </div>


    <div class="row g-4 mb-5">

        {{-- MANFAAT 1 --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100 p-4"
                 style="border-radius: 16px;">

                <div class="d-flex align-items-center mb-3">

                    <div class="rounded-3 bg-warning bg-opacity-10
                                d-flex align-items-center justify-content-center me-3"
                         style="width: 50px; height: 50px;">

                        <i class="fa-solid fa-lightbulb text-warning fs-4"></i>

                    </div>

                    <h5 class="fw-bold mb-0">
                        Kenali Minat
                    </h5>

                </div>

                <p class="text-muted mb-0">
                    Mengetahui bidang aktivitas yang paling menarik
                    dan sesuai dengan kecenderunganmu.
                </p>

            </div>

        </div>


        {{-- MANFAAT 2 --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100 p-4"
                 style="border-radius: 16px;">

                <div class="d-flex align-items-center mb-3">

                    <div class="rounded-3 bg-primary bg-opacity-10
                                d-flex align-items-center justify-content-center me-3"
                         style="width: 50px; height: 50px;">

                        <i class="fa-solid fa-chart-pie text-primary fs-4"></i>

                    </div>

                    <h5 class="fw-bold mb-0">
                        Hasil Tes
                    </h5>

                </div>

                <p class="text-muted mb-0">
                    Melihat skor dan tingkat kecocokan dari bidang
                    minat berdasarkan jawabanmu.
                </p>

            </div>

        </div>


        {{-- MANFAAT 3 --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100 p-4"
                 style="border-radius: 16px;">

                <div class="d-flex align-items-center mb-3">

                    <div class="rounded-3 bg-success bg-opacity-10
                                d-flex align-items-center justify-content-center me-3"
                         style="width: 50px; height: 50px;">

                        <i class="fa-solid fa-graduation-cap text-success fs-4"></i>

                    </div>

                    <h5 class="fw-bold mb-0">
                        Rekomendasi Jurusan
                    </h5>

                </div>

                <p class="text-muted mb-0">
                    Mendapatkan gambaran jurusan yang dapat menjadi
                    pertimbangan untuk rencana kuliahmu.
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
        CTA BAWAH
    ====================================================== --}}

    @if (!$sudahTes)

        <div class="card border-0 shadow-sm bg-primary text-white mb-4"
             style="border-radius: 20px;">

            <div class="card-body text-center p-4 p-md-5">

                <i class="fa-solid fa-rocket fa-2x mb-3"></i>

                <h3 class="fw-bold">
                    Siap Mengenal Potensimu?
                </h3>

                <p class="mb-4 opacity-75">
                    Luangkan beberapa menit untuk mengikuti tes
                    dan temukan bidang yang sesuai dengan dirimu.
                </p>

                <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}"
                   class="btn btn-light btn-lg px-4"
                   style="border-radius: 12px;">

                    <i class="fa-solid fa-play me-2"></i>
                    Mulai Tes Sekarang

                </a>

            </div>

        </div>

    @endif

</div>

@endsection