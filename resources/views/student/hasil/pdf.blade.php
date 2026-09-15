@extends('layouts.student')

@section('title', 'Hasil Tes')

@section('content')

@php
    $top3 = collect($detailSkor)
        ->sortByDesc('persentase')
        ->take(3)
        ->values();

    $utama = $top3->get(0);
    $alternatif1 = $top3->get(1);
    $alternatif2 = $top3->get(2);
@endphp


{{-- =========================================================
     TAMPILAN HASIL TES
========================================================= --}}

<div class="container-fluid py-3">

    {{-- Kartu hasil utama --}}
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius: 20px; overflow: hidden;">

        <div style="
            background: linear-gradient(135deg, #173b73, #315fe8);
            color: white;
            padding: 35px 30px;
            text-align: center;
        ">

            <div class="mb-2"
                 style="
                    font-size: 13px;
                    letter-spacing: 2px;
                    font-weight: 600;
                 ">
                HASIL TES
            </div>

            <h1 class="fw-bold mb-2">
                Tes Minat & Bakat
            </h1>

            <p class="mb-4 opacity-75">
                Selamat! Kamu telah menyelesaikan seluruh rangkaian tes.
            </p>

            <div style="
                background: rgba(255,255,255,0.12);
                border-radius: 14px;
                padding: 18px;
                max-width: 500px;
                margin: auto;
            ">

                <div style="
                    font-size: 12px;
                    letter-spacing: 1px;
                ">
                    DIBERIKAN KEPADA
                </div>

                <h3 class="fw-bold mt-2 mb-1">
                    {{ Auth::user()->name }}
                </h3>

                <div>
                    {{ Auth::user()->school_name }}
                    • Kelas {{ Auth::user()->class_level }}
                </div>

            </div>

        </div>


        {{-- Rekomendasi utama --}}
        @if($utama)

            <div class="p-4 text-center">

                <div class="text-muted mb-2"
                     style="
                        font-size: 13px;
                        font-weight: 600;
                        letter-spacing: 1px;
                     ">
                    REKOMENDASI UTAMA
                </div>

                <h2 class="fw-bold text-primary mb-2">
                    🥇 {{ $utama['nama_jurusan'] }}
                </h2>

                <div class="fw-bold"
                     style="font-size: 20px;">
                    {{ $utama['persentase'] }}% Kecocokan
                </div>

                <div class="progress mx-auto mt-3"
                     style="
                        height: 9px;
                        max-width: 500px;
                        border-radius: 10px;
                     ">

                    <div class="progress-bar"
                         style="
                            width: {{ $utama['persentase'] }}%;
                            border-radius: 10px;
                         ">
                    </div>

                </div>

            </div>

        @endif

    </div>


    {{-- =====================================================
         REKOMENDASI ALTERNATIF
    ====================================================== --}}

    <div class="card border-0 shadow-sm p-4 mb-4"
         style="border-radius: 20px;">

        <h5 class="fw-bold text-center mb-4">
            Rekomendasi Program Studi Alternatif
        </h5>

        <div class="row g-4 justify-content-center">

            @if ($alternatif1)

                <div class="col-md-5">

                    <div class="border rounded-4 p-4 text-center h-100">

                        <div class="fw-bold mb-2"
                             style="font-size: 22px;">
                            🥈
                        </div>

                        <h5 class="fw-bold mb-2">
                            {{ $alternatif1['nama_jurusan'] }}
                        </h5>

                        <div class="text-primary fw-bold">
                            {{ $alternatif1['persentase'] }}% Kecocokan
                        </div>

                        <div class="progress mt-3"
                             style="
                                height: 7px;
                                border-radius: 10px;
                             ">

                            <div class="progress-bar"
                                 style="
                                    width: {{ $alternatif1['persentase'] }}%;
                                    border-radius: 10px;
                                 ">
                            </div>

                        </div>

                    </div>

                </div>

            @endif


            @if ($alternatif2)

                <div class="col-md-5">

                    <div class="border rounded-4 p-4 text-center h-100">

                        <div class="fw-bold mb-2"
                             style="font-size: 22px;">
                            🥉
                        </div>

                        <h5 class="fw-bold mb-2">
                            {{ $alternatif2['nama_jurusan'] }}
                        </h5>

                        <div class="text-primary fw-bold">
                            {{ $alternatif2['persentase'] }}% Kecocokan
                        </div>

                        <div class="progress mt-3"
                             style="
                                height: 7px;
                                border-radius: 10px;
                             ">

                            <div class="progress-bar"
                                 style="
                                    width: {{ $alternatif2['persentase'] }}%;
                                    border-radius: 10px;
                                 ">
                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- =====================================================
         KETERANGAN
    ====================================================== --}}

    <div class="card border-0 shadow-sm p-4 mb-4"
         style="border-radius: 20px;">

        <h6 class="fw-bold mb-2">
            Tentang Hasil Tes
        </h6>

        <p class="text-muted mb-0">
            Hasil tes ini merupakan rekomendasi berdasarkan jawaban yang kamu berikan
            selama mengikuti tes minat dan bakat. Rekomendasi utama menunjukkan
            program studi dengan tingkat kecocokan tertinggi, sedangkan dua lainnya
            merupakan alternatif yang juga sesuai dengan hasil tes kamu.
        </p>

    </div>


    {{-- =====================================================
         TOMBOL DOWNLOAD PNG
    ====================================================== --}}

    <div class="text-center mb-4">

        <button
            type="button"
            id="download-hasil-png"
            class="btn btn-primary px-4 py-2"
            style="border-radius: 10px;"
        >

            <i class="fa-solid fa-image me-2"></i>

            Download Hasil PNG

        </button>

    </div>

</div>



{{-- =========================================================
     TEMPLATE SERTIFIKAT
     
     Template ini sengaja diletakkan jauh di luar layar.
     Jadi tidak terlihat di halaman, tetapi html2canvas
     tetap bisa mengambilnya untuk dijadikan PNG.
========================================================= --}}

<div id="certificate-wrapper">

    <div id="certificate-download">

        {{-- Dekorasi --}}
        <div class="circle-top-left"></div>

        <div class="circle-bottom-right"></div>


        {{-- Border --}}
        <div class="outer-border"></div>


        {{-- =================================================
             LOGO
        ================================================== --}}

        <div class="logo-area">

            <img
                src="{{ asset('images/admin-avatar.png') }}"
                class="logo"
                alt="Logo"
            >

            <div class="institution">
                INSTITUT TEKNOLOGI DIRGANTARA ADISUTJIPTO — YOGYAKARTA
            </div>

        </div>


        {{-- =================================================
             TOP BAR
        ================================================== --}}

        <div class="top-bar">

            <div class="brand">

                <span class="brand-icon">

                    <span class="brand-icon-inner"></span>

                </span>

                SIMPRODI

            </div>


            <div class="issued">

                Diterbitkan:

                {{ \Carbon\Carbon::parse($hasil->tanggal_tes)->format('j F Y') }}

            </div>

        </div>


        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="header">

            <div class="small-title">
                HASIL
            </div>

            <div class="title">
                Tes Minat & Bakat
            </div>

            <div class="subtitle">
                Selamat! Kamu telah menyelesaikan seluruh rangkaian tes
            </div>

        </div>


        {{-- =================================================
             DATA SISWA
        ================================================== --}}

        <div class="student">

            <div class="given">
                DIBERIKAN KEPADA
            </div>


            <div class="student-name">
                {{ Auth::user()->name }}
            </div>


            <div class="student-info">

                {{ Auth::user()->school_name }}

                @if(Auth::user()->class_level)

                    &nbsp;•&nbsp;

                    Kelas {{ Auth::user()->class_level }}

                @endif

            </div>


            <div class="student-line"></div>

        </div>


        {{-- =================================================
             REKOMENDASI UTAMA
        ================================================== --}}

        @if($utama)

            <div class="main-recommendation">

                <div class="main-label">
                    ANDA DIREKOMENDASIKAN PADA JURUSAN
                </div>

                <div class="main-major">
                    {{ $utama['nama_jurusan'] }}
                </div>

            </div>

        @endif


        {{-- =================================================
             JUDUL ALTERNATIF
        ================================================== --}}

        @if($alternatif1 || $alternatif2)

            <div class="alternative-title">
                REKOMENDASI JURUSAN ALTERNATIF
            </div>

        @endif


        {{-- =================================================
             ALTERNATIF 1
        ================================================== --}}

        @if($alternatif1)

            <div class="alternative alternative-left">

                <div class="badge">
                    Alternatif
                </div>


                <div class="alternative-major">
                    {{ $alternatif1['nama_jurusan'] }}
                </div>


                <div class="alternative-score">
                    {{ $alternatif1['persentase'] }}% Kecocokan
                </div>


                <div class="certificate-progress">

                    <div
                        class="progress-fill"
                        style="
                            width: {{ $alternatif1['persentase'] }}%;
                        "
                    >
                    </div>

                </div>

            </div>

        @endif


        {{-- =================================================
             ALTERNATIF 2
        ================================================== --}}

        @if($alternatif2)

            <div class="alternative alternative-right">

                <div class="badge">
                    Alternatif
                </div>


                <div class="alternative-major">
                    {{ $alternatif2['nama_jurusan'] }}
                </div>


                <div class="alternative-score">
                    {{ $alternatif2['persentase'] }}% Kecocokan
                </div>


                <div class="certificate-progress">

                    <div
                        class="progress-fill"
                        style="
                            width: {{ $alternatif2['persentase'] }}%;
                        "
                    >
                    </div>

                </div>

            </div>

        @endif


        {{-- =================================================
             FOOTER
             
             Tidak ada footer-line lagi supaya garis tipis
             yang tadi muncul benar-benar hilang.
        ================================================== --}}

        <div class="signature">

            <div class="signature-name">
                Tim SIMPRODI
            </div>

            <div class="signature-title">
                Penyelenggara Tes
            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     CSS SERTIFIKAT
========================================================= --}}

<style>

#certificate-wrapper {

    position: fixed;

    left: -2000px;

    top: 0;

    width: 1123px;

    height: 794px;

    overflow: hidden;

    pointer-events: none;

}


#certificate-download {

    width: 1123px;

    height: 794px;

    background: #ffffff;

    position: relative;

    overflow: hidden;

    margin: 0;

    font-family: Arial, sans-serif;

    color: #172b4d;

}


/* =========================================================
   DEKORASI
========================================================= */

.circle-top-left {

    position: absolute;

    width: 155px;

    height: 155px;

    background: #f0f3fb;

    border-radius: 0 0 100% 0;

    top: 0;

    left: 0;

}


.circle-bottom-right {

    position: absolute;

    width: 120px;

    height: 120px;

    background: #f0f3fb;

    border-radius: 100% 0 0 0;

    right: 0;

    bottom: 0;

}


/* =========================================================
   BORDER
========================================================= */

.outer-border {

    position: absolute;

    left: 18px;

    right: 18px;

    top: 18px;

    bottom: 18px;

    border: 2px solid #142b55;

    border-radius: 13px;

    z-index: 2;

}


/* =========================================================
   LOGO
========================================================= */

.logo-area {

    position: absolute;

    top: 40px;

    left: 0;

    right: 0;

    text-align: center;

    z-index: 3;

}


.logo {

    width: 78px;

    height: 78px;

    object-fit: contain;

}


.institution {

    margin-top: 2px;

    font-size: 11px;

    font-weight: bold;

    letter-spacing: 0.6px;

    color: #687287;

}


/* =========================================================
   TOP BAR
========================================================= */

.top-bar {

    position: absolute;

    left: 64px;

    right: 64px;

    top: 145px;

    height: 40px;

    z-index: 3;

}


.brand {

    float: left;

    font-size: 15px;

    font-weight: bold;

    color: #142b55;

    line-height: 36px;

}


.brand-icon {

    display: inline-block;

    width: 36px;

    height: 36px;

    background: #142b55;

    border-radius: 10px;

    vertical-align: middle;

    margin-right: 5px;

    position: relative;

}


.brand-icon-inner {

    position: absolute;

    width: 17px;

    height: 17px;

    border: 2px solid #ffffff;

    border-radius: 50%;

    left: 9px;

    top: 9px;

}


.brand-icon-inner:after {

    content: "";

    position: absolute;

    width: 4px;

    height: 4px;

    background: #ffffff;

    border-radius: 50%;

    left: 4px;

    top: 4px;

}


.issued {

    float: right;

    font-size: 10px;

    color: #687287;

    line-height: 36px;

}


/* =========================================================
   HEADER
========================================================= */

.header {

    position: absolute;

    left: 0;

    right: 0;

    top: 202px;

    text-align: center;

    z-index: 3;

}


.small-title {

    font-size: 12px;

    font-weight: bold;

    letter-spacing: 2px;

    color: #315fe8;

}


.title {

    font-family: Georgia, serif;

    font-size: 34px;

    color: #142b55;

    margin-top: 10px;

}


.subtitle {

    font-size: 12px;

    color: #687287;

    margin-top: 10px;

}


/* =========================================================
   DATA SISWA
========================================================= */

.student {

    position: absolute;

    left: 0;

    right: 0;

    top: 323px;

    text-align: center;

    z-index: 3;

}


.given {

    font-size: 10px;

    font-weight: bold;

    letter-spacing: 1.5px;

    color: #687287;

}


.student-name {

    font-family: Georgia, serif;

    font-size: 32px;

    font-weight: bold;

    font-style: italic;

    color: #142b55;

    margin-top: 10px;

}


.student-info {

    font-size: 12px;

    color: #687287;

    margin-top: 8px;

}


.student-line {

    width: 70px;

    height: 3px;

    background: #315fe8;

    border-radius: 5px;

    margin: 20px auto 0;

}


/* =========================================================
   REKOMENDASI UTAMA
========================================================= */

.main-recommendation {

    position: absolute;

    left: 64px;

    right: 64px;

    top: 501px;

    height: 88px;

    background: #f0f3fb;

    border: 1px solid #dce4f5;

    border-radius: 16px;

    text-align: center;

    padding-top: 17px;

    z-index: 3;

}


.main-label {

    font-size: 10px;

    font-weight: bold;

    letter-spacing: 1.1px;

    color: #687287;

}


.main-major {

    font-size: 20px;

    font-weight: bold;

    color: #315fe8;

    margin-top: 10px;

}


/* =========================================================
   ALTERNATIF
========================================================= */

.alternative-title {

    position: absolute;

    top: 618px;

    left: 0;

    right: 0;

    text-align: center;

    font-size: 12px;

    font-weight: bold;

    color: #142b55;

    z-index: 3;

}


.alternative {

    position: absolute;

    top: 650px;

    width: 260px;

    height: 99px;

    border: 1px solid #dce4f5;

    border-radius: 16px;

    background: #ffffff;

    text-align: center;

    padding-top: 28px;

    z-index: 3;

}


.alternative-left {

    left: 94px;

}


.alternative-right {

    right: 94px;

}


.badge {

    position: absolute;

    top: -11px;

    left: 50%;

    transform: translateX(-50%);

    background: #142b55;

    color: #ffffff;

    border-radius: 12px;

    padding: 5px 13px;

    font-size: 9px;

    font-weight: bold;

}


.alternative-major {

    font-size: 13px;

    font-weight: bold;

    color: #142b55;

}


.alternative-score {

    font-size: 10px;

    font-weight: bold;

    color: #315fe8;

    margin-top: 8px;

}


.certificate-progress {

    width: 230px;

    height: 7px;

    background: #e0e6f3;

    border-radius: 10px;

    margin: 10px auto 0;

    overflow: hidden;

}


.progress-fill {

    height: 7px;

    background: #315fe8;

    border-radius: 10px;

}


/* =========================================================
   SIGNATURE
========================================================= */

.signature {

    position: absolute;

    left: 0;

    right: 0;

    bottom: 45px;

    text-align: center;

    z-index: 3;

}


.signature-name {

    font-family: Georgia, serif;

    font-size: 21px;

    font-style: italic;

    color: #142b55;

}


.signature-title {

    font-size: 9px;

    color: #687287;

    margin-top: 7px;

}

</style>



{{-- =========================================================
     HTML2CANVAS
========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('download-hasil-png');

    if (!button) {
        return;
    }


    button.addEventListener('click', async function () {

        if (typeof html2canvas === 'undefined') {

            alert(
                'Library PNG belum berhasil dimuat. Silakan refresh halaman.'
            );

            return;
        }


        const certificate =
            document.getElementById('certificate-download');


        if (!certificate) {

            alert(
                'Template sertifikat tidak ditemukan.'
            );

            return;
        }


        button.disabled = true;

        button.innerHTML =
            '<i class="fa-solid fa-spinner fa-spin me-2"></i>' +
            'Membuat PNG...';


        try {

            /*
             * Tunggu gambar/logo selesai dimuat.
             */
            const images =
                certificate.querySelectorAll('img');


            await Promise.all(

                Array.from(images).map(function (img) {

                    if (img.complete) {
                        return Promise.resolve();
                    }

                    return new Promise(function (resolve) {

                        img.onload = resolve;

                        img.onerror = resolve;

                    });

                })

            );


            /*
             * Buat gambar sertifikat.
             */
            const canvas = await html2canvas(
                certificate,
                {

                    scale: 2,

                    useCORS: true,

                    allowTaint: false,

                    backgroundColor: '#ffffff',

                    width: 1123,

                    height: 794,

                    logging: false

                }
            );


            /*
             * Buat file PNG.
             */
            const link =
                document.createElement('a');


            link.download =
                'Hasil-Tes-Minat-Bakat-' +
                '{{ Str::slug(Auth::user()->name) }}' +
                '.png';


            link.href =
                canvas.toDataURL('image/png');


            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);


        } catch (error) {

            console.error(
                'Gagal membuat PNG:',
                error
            );

            alert(
                'Gagal membuat PNG. Silakan coba lagi.'
            );


        } finally {

            button.disabled = false;

            button.innerHTML =
                '<i class="fa-solid fa-image me-2"></i>' +
                'Download Hasil PNG';

        }

    });

});

</script>


@endsection