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
            <i class="fa-solid fa-house me-1"></i> Beranda
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


<!-- KUNJUNGI ITDA -->
<section class="itda-contact-section">
    <div class="itda-contact-card">

        <!-- Header -->
        <div class="itda-contact-header">
            <div class="itda-contact-header-icon">
                <i class="fa-solid fa-building-columns"></i>
            </div>

            <div>
                <h3>Kunjungi ITDA</h3>
                <p>Informasi kontak dan media sosial Institut Teknologi Dirgantara Adisutjipto</p>
            </div>
        </div>

        <!-- Contact Grid -->
        <div class="contact-grid">

            <!-- Lokasi -->
            <a href="https://maps.app.goo.gl/rwLmS4dLwfU2iN3W6"
               target="_blank"
               rel="noopener noreferrer"
               class="contact-box contact-link contact-location">

                <div class="contact-box-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div class="contact-box-content">
                    <span class="contact-label">Lokasi</span>

                    <strong>
                        Institut Teknologi Dirgantara Adisutjipto
                    </strong>

                    <small class="location-link">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        Lihat di Google Maps
                    </small>
                </div>

            </a>


            <!-- Email -->
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@itda.ac.id"
                target="_blank"
                rel="noopener noreferrer"
                class="contact-box contact-link">

                    <div class="contact-box-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="contact-box-content">
                        <span class="contact-label">Email</span>

                        <strong>
                            info@itda.ac.id
                        </strong>

                        <small class="contact-action">
                            <i class="fa-solid fa-envelope"></i>
                            Buka Gmail
                        </small>
                    </div>

                </a>


            <!-- Hunting -->
            <a href="tel:+62274451262"
               class="contact-box contact-link">

                <div class="contact-box-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <div class="contact-box-content">
                    <span class="contact-label">Hunting</span>

                    <strong>
                        +62 274 451262
                    </strong>

                    <small class="contact-action">
                        <i class="fa-solid fa-phone"></i>
                        Hubungi sekarang
                    </small>
                </div>

            </a>


            <!-- Telepon -->
            <a href="tel:+62274451263"
               class="contact-box contact-link">

                <div class="contact-box-icon">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>

                <div class="contact-box-content">
                    <span class="contact-label">Telepon</span>

                    <strong>
                        +62 274 451263
                    </strong>

                    <small class="contact-action">
                        <i class="fa-solid fa-phone"></i>
                        Hubungi sekarang
                    </small>
                </div>

            </a>


            <!-- Fax -->
            <a href="tel:+62274451265"
               class="contact-box contact-link">

                <div class="contact-box-icon">
                    <i class="fa-solid fa-fax"></i>
                </div>

                <div class="contact-box-content">
                    <span class="contact-label">Fax</span>

                    <strong>
                        +62 274 451265
                    </strong>

                    <small class="contact-action">
                        <i class="fa-solid fa-phone"></i>
                        Hubungi nomor
                    </small>
                </div>

            </a>

        </div>


        <!-- SOCIAL MEDIA -->
        <div class="social-media-section">

            <div class="social-divider"></div>

            <div class="social-media-header">
                <span>Ikuti Kami</span>
                <p>Temukan informasi terbaru melalui media sosial ITDA</p>
            </div>

            <div class="social-media-list">

                <!-- Facebook -->
                <a href="https://www.facebook.com/ITDA.YK"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item facebook">

                    <i class="fa-brands fa-facebook-f"></i>
                    <span>Facebook</span>

                </a>


                <!-- Instagram -->
                <a href="https://www.instagram.com/itda.yogyakarta/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item instagram">

                    <i class="fa-brands fa-instagram"></i>
                    <span>Instagram</span>

                </a>


                <!-- YouTube -->
                <a href="https://www.youtube.com/@itda.yogyakarta"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item youtube">

                    <i class="fa-brands fa-youtube"></i>
                    <span>YouTube</span>

                </a>


                <!-- TikTok -->
                <a href="https://www.tiktok.com/@itda.yogyakarta"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item tiktok">

                    <i class="fa-brands fa-tiktok"></i>
                    <span>TikTok</span>

                </a>

            </div>

        </div>

    </div>
</section>


{{-- =====================================================
    CSS KUNJUNGI ITDA
===================================================== --}}

<style>


/* ==================================================
   DASHBOARD - AEROSPACE EXECUTIVE
   Tampilan saja, tanpa mengubah logika Blade
   ================================================== */

/* Sapaan siswa */

.main-content > .container-fluid > .mb-4:first-child {
    position: relative;
    padding: 8px 0 22px 18px;
    border-left: 3px solid #d6b46a;
}

.main-content > .container-fluid > .mb-4:first-child > span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #246bce !important;
    font-size: 11px;
    font-weight: 750;
    letter-spacing: 1.3px;
    text-transform: uppercase;
}

.main-content > .container-fluid > .mb-4:first-child h2 {
    margin-top: 12px !important;
    color: #102a4c;
    font-size: clamp(23px, 2.2vw, 32px);
    line-height: 1.3;
    letter-spacing: -.7px;
}

.main-content > .container-fluid > .mb-4:first-child p {
    max-width: 680px;
    color: #748196 !important;
    font-size: 14px;
}

/* Kartu hasil tes dan kartu ajakan tes */

.main-content .container-fluid > .card:first-of-type {
    position: relative;
    overflow: hidden;
    border-top: 3px solid #d6b46a !important;
}

.main-content .container-fluid > .card:first-of-type::after {
    content: "";
    position: absolute;
    top: -65px;
    right: -65px;
    width: 180px;
    height: 180px;
    border: 1px solid rgba(214, 180, 106, .22);
    border-radius: 50%;
    pointer-events: none;
}

.main-content .container-fluid > .card:first-of-type .card-body {
    position: relative;
    z-index: 1;
}

.main-content .container-fluid > .card h2.text-primary {
    color: #246bce !important;
    letter-spacing: -.7px;
}

.main-content .container-fluid > .card .text-teal {
    color: #b28b35 !important;
}

.main-content .container-fluid > .card .bg-teal {
    background-color: #f7f0df !important;
}

/* Ilustrasi hasil tes */

.main-content .container-fluid > .card .fa-award {
    color: #b28b35 !important;
}

.main-content .container-fluid > .card .rounded-circle,
.main-content .container-fluid > .card .rounded-4 {
    border: 1px solid rgba(214, 180, 106, .24);
}

/* Judul bagian */

.main-content .container-fluid > .text-center {
    position: relative;
}

.main-content .container-fluid > .text-center > span {
    display: inline-block;
    color: #246bce !important;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.main-content .container-fluid > .text-center h3 {
    margin-top: 10px !important;
    color: #102a4c;
    font-size: clamp(21px, 2vw, 27px);
    font-weight: 800;
    letter-spacing: -.5px;
}

.main-content .container-fluid > .text-center p {
    color: #748196 !important;
    font-size: 14px;
}

/* Kartu langkah dan manfaat */

.main-content .container-fluid .row.g-4 > div > .card {
    height: 100%;
    border-radius: 16px !important;
    background: #fff;
}

.main-content .container-fluid .row.g-4 > div > .card:hover {
    transform: translateY(-4px);
    border-color: rgba(214, 180, 106, .65) !important;
    box-shadow: 0 14px 30px rgba(16, 42, 76, .09) !important;
}

.main-content .container-fluid .row.g-4 > div > .card h5 {
    color: #102a4c;
    font-size: 15px;
    font-weight: 750;
}

.main-content .container-fluid .row.g-4 > div > .card p {
    color: #748196 !important;
    font-size: 13px;
    line-height: 1.75;
}

.main-content .container-fluid .row.g-4 > div > .card .rounded-circle,
.main-content .container-fluid .row.g-4 > div > .card .rounded-3 {
    border: 1px solid rgba(36, 107, 206, .08);
}

/* ==================================================
   PANEL KONTAK ITDA
   ================================================== */

.itda-contact-section {
    margin-top: 36px;
    padding: 0;
}

.itda-contact-card {
    padding: 28px;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e3e9f1;
    border-radius: 20px;
    box-shadow: 0 8px 28px rgba(16, 42, 76, .055);
}

.itda-contact-header {
    margin-bottom: 24px;
    text-align: center;
}

.itda-contact-header-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    margin-bottom: 10px;
    color: #b28b35;
    background: #f7f0df;
    border: 1px solid rgba(214, 180, 106, .3);
    border-radius: 13px;
}

.itda-contact-header h3 {
    color: #102a4c !important;
    font-size: 22px;
    font-weight: 850;
    letter-spacing: .5px;
    text-transform: uppercase;
}

.itda-contact-header p {
    color: #748196 !important;
    font-size: 12px;
    line-height: 1.7;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;
}

.contact-box {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    min-width: 0;
    padding: 17px;
    color: #102a4c;
    background: #f8fafd;
    border: 1px solid #e6ecf4;
    border-radius: 13px;
    text-decoration: none;
    transition: .2s ease;
}

.contact-box:hover {
    color: #102a4c;
    background: #fff;
    border-color: #d6b46a;
    transform: translateY(-2px);
}

.contact-box-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 38px;
    width: 38px;
    height: 38px;
    color: #246bce;
    background: #eaf2ff;
    border-radius: 11px;
}

.contact-box-content {
    display: flex;
    flex-direction: column;
    min-width: 0;
    gap: 5px;
}

.contact-label {
    color: #748196;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .7px;
    text-transform: uppercase;
}

.contact-box-content strong {
    overflow-wrap: anywhere;
    color: #102a4c;
    font-size: 12px;
    line-height: 1.6;
}

.contact-box-content small {
    color: #246bce;
    font-size: 10px;
}

.social-media-section {
    margin-top: 25px;
}

.social-divider {
    height: 1px;
    margin-bottom: 22px;
    background: #e3e9f1;
}

.social-media-header {
    margin-bottom: 15px;
    text-align: center;
}

.social-media-header span {
    color: #102a4c;
    font-size: 14px;
    font-weight: 800;
}

.social-media-header p {
    margin-top: 5px;
    color: #748196;
    font-size: 12px;
}

.social-media-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}

.social-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    color: #102a4c;
    background: #f8fafd;
    border: 1px solid #e3e9f1;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 650;
    text-decoration: none;
    transition: .2s ease;
}

.social-item:hover {
    color: #246bce;
    background: #eaf2ff;
    border-color: #c9dcfa;
    transform: translateY(-2px);
}

/* RESPONSIVE DASHBOARD */

@media (max-width: 768px) {
    .main-content > .container-fluid > .mb-4:first-child {
        padding-left: 12px;
    }

    .main-content .container-fluid > .card:first-of-type .row {
        --bs-gutter-y: 20px;
    }

    .main-content .container-fluid > .card:first-of-type .rounded-circle,
    .main-content .container-fluid > .card:first-of-type .rounded-4 {
        max-width: 130px;
        max-height: 130px;
    }

    .itda-contact-card {
        padding: 18px 12px;
    }

    .itda-contact-header h3 {
        font-size: 18px;
    }

    .contact-grid {
        grid-template-columns: minmax(0, 1fr);
    }

    .contact-box {
        padding: 13px;
    }

    .social-media-list {
        gap: 8px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .main-content .card,
    .contact-box,
    .social-item,
    .main-content .btn {
        transition: none !important;
    }

    .main-content .card:hover,
    .contact-box:hover,
    .social-item:hover,
    .main-content .btn:hover {
        transform: none !important;
    }
}


</style>

@endsection