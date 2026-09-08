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
            <a href="LINK_GOOGLE_MAPS"
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
                <a href="MASUKKAN_LINK_FACEBOOK_DI_SINI"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item facebook">

                    <i class="fa-brands fa-facebook-f"></i>
                    <span>Facebook</span>

                </a>


                <!-- Instagram -->
                <a href="MASUKKAN_LINK_INSTAGRAM_DI_SINI"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item instagram">

                    <i class="fa-brands fa-instagram"></i>
                    <span>Instagram</span>

                </a>


                <!-- YouTube -->
                <a href="MASUKKAN_LINK_YOUTUBE_DI_SINI"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-item youtube">

                    <i class="fa-brands fa-youtube"></i>
                    <span>YouTube</span>

                </a>


                <!-- TikTok -->
                <a href="MASUKKAN_LINK_TIKTOK_DI_SINI"
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

/* =====================================================
   MAIN CONTACT CARD
===================================================== */

.itda-contact-section {
    margin-top: 48px;
    margin-bottom: 20px;
}

.itda-contact-card {
    border-radius: 20px;
    overflow: hidden;
    background: #ffffff;
}

.itda-contact-card .card-body {
    padding: 42px 48px 38px;
}


/* =====================================================
   HEADER
===================================================== */

.itda-contact-header {
    margin-bottom: 34px;
}

.itda-contact-badge {
    width: 52px;
    height: 52px;

    margin: 0 auto 14px;

    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eef4ff;
    color: #1264ff;

    font-size: 21px;
}

.itda-contact-header h3 {
    margin: 0;

    font-size: 25px;
    font-weight: 700;

    color: #172b4d;

    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.itda-contact-header p {
    margin: 7px 0 0;

    color: #6c757d;

    font-size: 14px;
}


/* =====================================================
   CONTACT GRID
===================================================== */

.contact-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 14px;
}


/* =====================================================
   CONTACT BOX
===================================================== */

.contact-box {
    min-height: 82px;

    display: flex;
    align-items: center;

    gap: 14px;

    padding: 16px 18px;

    border: 1px solid #edf0f5;

    border-radius: 13px;

    background: #fafbfd;

    transition: all 0.25s ease;
}

.contact-box:hover {
    background: #ffffff;

    border-color: #dce7ff;

    transform: translateY(-2px);

    box-shadow: 0 6px 18px rgba(23, 59, 112, 0.07);
}


/* =====================================================
   CONTACT ICON
===================================================== */

.contact-box-icon {
    width: 42px;
    height: 42px;

    min-width: 42px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eef4ff;

    color: #1264ff;

    font-size: 16px;
}


/* =====================================================
   CONTACT TEXT
===================================================== */

.contact-box-content {
    min-width: 0;
}

.contact-label {
    display: block;

    margin-bottom: 4px;

    color: #7a8494;

    font-size: 12px;

    font-weight: 500;
}

.contact-box-content strong {
    display: block;

    color: #172b4d;

    font-size: 14px;

    font-weight: 600;

    word-break: break-word;
}

            /* =====================================================
            LOKASI GOOGLE MAPS
            ===================================================== */

            .contact-location {
                color: inherit;
                text-decoration: none;
                cursor: pointer;
            }

            .contact-location:hover {
                color: inherit;
                text-decoration: none;
            }

            .contact-location .contact-box-content {
                flex: 1;
            }

            .location-link {
                display: block;

                margin-top: 5px;

                color: #1264ff;

                font-size: 11px;

                font-weight: 500;

                opacity: 0;

                transform: translateY(3px);

                transition: all 0.25s ease;
            }

            .contact-location:hover .location-link {
                opacity: 1;
                transform: translateY(0);

                /* =====================================================
                    CONTACT LINK
                    ===================================================== */

                    .contact-link {
                        color: inherit;
                        text-decoration: none;
                        cursor: pointer;
                    }

                    .contact-link:hover {
                        color: inherit;
                        text-decoration: none;
                    }

                    .contact-link .contact-box-content {
                        flex: 1;
                    }


                    /* =====================================================
                    ACTION TEXT
                    ===================================================== */

                    .contact-action {
                        display: block;

                        margin-top: 5px;

                        color: #1264ff;

                        font-size: 11px;

                        font-weight: 500;

                        opacity: 0;

                        transform: translateY(3px);

                        transition: all 0.25s ease;
                    }

                    .contact-link:hover .contact-action {
                        opacity: 1;

                        transform: translateY(0);
                    }
}


/* =====================================================
   SOCIAL MEDIA SECTION
===================================================== */

.itda-social-section {
    margin-top: 32px;
}

.social-divider {
    height: 1px;

    background: #edf0f4;

    margin-bottom: 25px;
}

.social-header {
    text-align: center;

    margin-bottom: 16px;
}

.social-header span {
    display: block;

    color: #172b4d;

    font-size: 15px;

    font-weight: 700;
}

.social-header p {
    margin: 4px 0 0;

    color: #8a94a4;

    font-size: 12px;
}


/* =====================================================
   SOCIAL MEDIA BUTTON
===================================================== */

.social-media-list {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;
}

.social-media-link {
    width: 44px;
    height: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #e1e5eb;

    border-radius: 11px;

    background: #ffffff;

    color: #667085;

    text-decoration: none;

    font-size: 17px;

    transition: all 0.25s ease;
}

.social-media-link:hover {
    color: #ffffff;

    transform: translateY(-4px);

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
    background: #111111;
    border-color: #111111;
}


/* =====================================================
   TABLET
===================================================== */

@media (max-width: 991.98px) {

    .contact-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 575.98px) {

    .itda-contact-card .card-body {
        padding: 30px 20px;
    }

    .itda-contact-header h3 {
        font-size: 21px;
    }

    .contact-grid {
        grid-template-columns: 1fr;
    }

    .contact-box {
        min-height: 76px;
    }

}

</style>

@endsection