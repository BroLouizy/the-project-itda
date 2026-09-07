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
                            <div class="rounded-circle bg-teal bg-opacity-10
                                        d-flex align-items-center justify-content-center me-3"
                                 style="width: 55px; height: 55px;">
                                <i class="fa-solid fa-graduation-cap text-teal fs-4"></i>
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

                            <strong class="text-teal">
                                {{ $hasilTerakhir->persentase }}%
                            </strong>
                        </div>

                        <div class="progress mb-4"
                             style="height: 14px; border-radius: 20px;">

                            <div class="progress-bar bg-teal"
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

                        <div class="mx-auto rounded-4 bg-teal bg-opacity-10
                                    d-flex align-items-center justify-content-center"
                             style="width: 190px; height: 190px;">

                            <i class="fa-solid fa-award text-teal"
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

                <div class="rounded-circle bg-teal bg-opacity-10
                            d-flex align-items-center justify-content-center
                            mx-auto mb-3"
                     style="width: 70px; height: 70px;">

                    <i class="fa-solid fa-graduation-cap text-teal fs-3"></i>

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

                    <div class="rounded-3 bg-teal bg-opacity-10
                                d-flex align-items-center justify-content-center me-3"
                         style="width: 50px; height: 50px;">

                        <i class="fa-solid fa-graduation-cap text-teal fs-4"></i>

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
    CONTACT PERSON ITDA
===================================================== --}}

<div class="contact-section mt-5 mb-4">

<div class="card border-0 shadow-sm contact-card">

    <div class="card-body p-4 p-md-5">


        {{-- =================================================
            JUDUL
        ================================================== --}}

        <div class="text-center mb-5">

            <span class="contact-title">
                KUNJUNGI ITDA
            </span>

            <p class="text-muted mb-0 mt-2">
                Informasi dan kontak ITDA
            </p>

        </div>


        {{-- =================================================
            INFORMASI KONTAK
        ================================================== --}}

        <div class="row justify-content-center g-4">


            {{-- LOKASI --}}

            <div class="col-md-6 col-lg-4">

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Lokasi
                        </small>

                        <span class="contact-value">
                            Lokasi Kampus
                        </span>

                    </div>

                </div>

            </div>


            {{-- EMAIL --}}

            <div class="col-md-6 col-lg-4">

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-regular fa-envelope"></i>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Email
                        </small>

                        <span class="contact-value">
                            info@itda.ac.id
                        </span>

                    </div>

                </div>

            </div>


            {{-- HUNTING --}}

            <div class="col-md-6 col-lg-4">

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Hunting
                        </small>

                        <span class="contact-value">
                            +62 274 451262
                        </span>

                    </div>

                </div>

            </div>


            {{-- TELEPON --}}

            <div class="col-md-6 col-lg-4">

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Telepon
                        </small>

                        <span class="contact-value">
                            +62 274 451263
                        </span>

                    </div>

                </div>

            </div>


            {{-- FAX --}}

            <div class="col-md-6 col-lg-4">

                <div class="contact-item">

                    <div class="contact-icon">

                        <i class="fa-solid fa-fax"></i>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Fax
                        </small>

                        <span class="contact-value">
                            +62 274451265
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            SOCIAL MEDIA
        ================================================== --}}

        <div class="social-media-section">

            <p class="text-muted small mb-3">
                Ikuti ITDA di media sosial
            </p>


            <div class="social-media-list">


                {{-- FACEBOOK --}}

                <a href="https://www.facebook.com/ITDA.YK"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-media-link facebook"
                   aria-label="Facebook ITDA"
                   title="Facebook">

                    <i class="fa-brands fa-facebook-f"></i>

                </a>

                {{-- INSTAGRAM --}}

                <a href="https://www.instagram.com/itda.yogyakarta/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-media-link instagram"
                   aria-label="Instagram ITDA"
                   title="Instagram">

                    <i class="fa-brands fa-instagram"></i>

                </a>


                {{-- YOUTUBE --}}

                <a href="https://www.youtube.com/@itda.yogyakarta"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-media-link youtube"
                   aria-label="YouTube ITDA"
                   title="YouTube">

                    <i class="fa-brands fa-youtube"></i>

                </a>


                {{-- TIKTOK --}}

                <a href="https://www.tiktok.com/@itda.yogyakarta"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-media-link tiktok"
                   aria-label="TikTok ITDA"
                   title="TikTok">

                    <i class="fa-brands fa-tiktok"></i>

                </a>


            </div>

        </div>


    </div>

</div>

</div>


                {{-- =====================================================
                CSS CONTACT & SOCIAL MEDIA
                ===================================================== --}}

                <style>

                /* =====================================================
                CONTACT CARD
                ===================================================== */

                .contact-card {

                border-radius: 18px;

                background: #fff;

                }


                /* =====================================================
                CONTACT TITLE
                ===================================================== */

                .contact-title {

                font-size: 24px;

                font-weight: 700;

                color: #172b4d;

                }


                /* =====================================================
                CONTACT ITEM
                ===================================================== */

                .contact-item {

                display: flex;

                align-items: center;

                gap: 14px;

                min-height: 64px;

                }


                /* =====================================================
                CONTACT ICON
                ===================================================== */

                .contact-icon {

                width: 46px;

                height: 46px;

                min-width: 46px;

                border-radius: 12px;

                background: #eef4ff;

                color: #1264ff;

                display: flex;

                align-items: center;

                justify-content: center;

                font-size: 18px;

                transition: all 0.25s ease;

                }


                /* Hover contact */

                .contact-item:hover .contact-icon {

                transform: translateY(-2px);

                box-shadow: 0 5px 12px rgba(18, 100, 255, 0.12);

                }


                /* =====================================================
                CONTACT TEXT
                ===================================================== */

                .contact-value {

                display: block;

                margin-top: 3px;

                font-size: 16px;

                color: #172b4d;

                }


                /* =====================================================
                SOCIAL MEDIA
                ===================================================== */

                .social-media-section {

                margin-top: 45px;

                padding-top: 25px;

                border-top: 1px solid #edf0f4;

                text-align: center;

                }


                /* Container */

                .social-media-list {

                display: flex;

                justify-content: center;

                align-items: center;

                gap: 10px;

                flex-wrap: wrap;

                }


                /* =====================================================
                SOCIAL MEDIA BUTTON
                ===================================================== */

                .social-media-link {

                width: 48px;

                height: 48px;

                display: flex;

                align-items: center;

                justify-content: center;

                border: 1px solid #dee2e6;

                border-radius: 12px;

                background: #fff;

                color: #6c757d;

                text-decoration: none;

                font-size: 18px;

                transition: all 0.25s ease;

                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);

                }


                /* =====================================================
                SOCIAL MEDIA HOVER
                ===================================================== */

                .social-media-link:hover {

                transform: translateY(-4px);

                color: #fff;

                box-shadow: 0 7px 16px rgba(0, 0, 0, 0.12);

                }


                /* =====================================================
                FACEBOOK
                ===================================================== */

                .social-media-link.facebook:hover {

                background: #1877f2;

                border-color: #1877f2;

                }


                /* =====================================================
                LINKEDIN
                ===================================================== */

                .social-media-link.linkedin:hover {

                background: #0a66c2;

                border-color: #0a66c2;

                }


                /* =====================================================
                INSTAGRAM
                ===================================================== */

                .social-media-link.instagram:hover {

                background: #e4405f;

                border-color: #e4405f;

                }


                /* =====================================================
                YOUTUBE
                ===================================================== */

                .social-media-link.youtube:hover {

                background: #ff0000;

                border-color: #ff0000;

                }


                /* =====================================================
                TIKTOK
                ===================================================== */

                .social-media-link.tiktok:hover {

                background: #111;

                border-color: #111;

                }


                /* =====================================================
                MOBILE
                ===================================================== */

                @media (max-width: 576px) {

                .contact-card .card-body {

                    padding: 25px 18px !important;

                }


                .social-media-link {

                    width: 44px;

                    height: 44px;

                    font-size: 17px;

                }


                .contact-title {

                    font-size: 21px;

                }

}

</style>

@endsection