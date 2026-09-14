<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Sertifikat Hasil Tes Minat & Bakat</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            font-family: DejaVu Sans, sans-serif;
            color: #172b4d;
        }

        .page {
            width: 1123px;
            height: 794px;
            padding: 28px;
        }

        /* =====================================
           SERTIFIKAT
        ===================================== */

        .certificate {
            width: 100%;
            height: 100%;
            position: relative;

            border: 2px solid #173b73;
            background: #ffffff;

            padding: 10px;
        }

        .certificate-inner {
            width: 100%;
            height: 100%;
            position: relative;

            border: 1px solid #b8c9e6;

            padding: 45px 70px;
        }

        /* =====================================
           ORNAMEN SUDUT
        ===================================== */

        .corner {
            position: absolute;
            width: 75px;
            height: 75px;
        }

        .corner-tl {
            top: 0;
            left: 0;
            border-top: 7px solid #315fe8;
            border-left: 7px solid #315fe8;
        }

        .corner-tr {
            top: 0;
            right: 0;
            border-top: 7px solid #315fe8;
            border-right: 7px solid #315fe8;
        }

        .corner-bl {
            bottom: 0;
            left: 0;
            border-bottom: 7px solid #315fe8;
            border-left: 7px solid #315fe8;
        }

        .corner-br {
            bottom: 0;
            right: 0;
            border-bottom: 7px solid #315fe8;
            border-right: 7px solid #315fe8;
        }

        /* =====================================
           HEADER
        ===================================== */

        .header {
            text-align: center;
        }

        .brand {
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 4px;
            color: #173b73;
        }

        .brand-subtitle {
            font-size: 9px;
            color: #718096;
            letter-spacing: 1px;
            margin-top: 5px;
        }

        .ornament {
            width: 100px;
            height: 2px;
            background: #315fe8;
            margin: 15px auto;
        }

        .certificate-title {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #173b73;
            margin-top: 5px;
        }

        .certificate-subtitle {
            font-size: 11px;
            color: #718096;
            letter-spacing: 1px;
            margin-top: 6px;
        }

        /* =====================================
           NAMA SISWA
        ===================================== */

        .given {
            text-align: center;
            margin-top: 28px;
            font-size: 10px;
            color: #718096;
            letter-spacing: 2px;
        }

        .student-name {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            color: #173b73;
            margin-top: 8px;
        }

        .student-info {
            text-align: center;
            font-size: 10px;
            color: #718096;
            margin-top: 6px;
        }

        /* =====================================
           KETERANGAN
        ===================================== */

        .statement {
            text-align: center;
            font-size: 10px;
            color: #4a5568;
            margin-top: 24px;
            line-height: 1.6;
        }

        /* =====================================
           REKOMENDASI UTAMA
        ===================================== */

        .main-result {
            width: 570px;
            margin: 18px auto 0 auto;

            text-align: center;

            border: 1px solid #b8c9e6;
            background: #f5f8ff;

            padding: 15px 25px;
        }

        .main-label {
            font-size: 9px;
            font-weight: bold;
            color: #718096;
            letter-spacing: 2px;
        }

        .main-major {
            font-size: 21px;
            font-weight: bold;
            color: #315fe8;
            margin-top: 6px;
        }

        .main-score {
            font-size: 13px;
            font-weight: bold;
            color: #173b73;
            margin-top: 5px;
        }

        /* =====================================
           ALTERNATIF
        ===================================== */

        .alternative-title {
            text-align: center;
            margin-top: 17px;

            font-size: 9px;
            font-weight: bold;
            color: #718096;
            letter-spacing: 2px;
        }

        .alternatives {
            width: 650px;
            margin: 9px auto 0 auto;
            border-collapse: separate;
            border-spacing: 12px 0;
        }

        .alternative {
            width: 50%;

            border: 1px solid #d9e2f2;
            background: #ffffff;

            padding: 9px;

            text-align: center;
        }

        .rank {
            font-size: 15px;
            font-weight: bold;
            color: #315fe8;
        }

        .alternative-major {
            font-size: 11px;
            font-weight: bold;
            color: #173b73;
            margin-top: 4px;
        }

        .alternative-score {
            font-size: 9px;
            color: #315fe8;
            font-weight: bold;
            margin-top: 4px;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .footer {
            position: absolute;
            bottom: 35px;
            left: 70px;
            right: 70px;
        }

        .date {
            float: left;
            font-size: 9px;
            color: #718096;
            padding-top: 15px;
        }

        .signature {
            float: right;
            text-align: center;
            width: 180px;
        }

        .signature-line {
            border-top: 1px solid #718096;
            margin-top: 25px;
            padding-top: 5px;
            font-size: 9px;
            color: #718096;
        }

        .system {
            position: absolute;
            bottom: 12px;
            left: 0;
            right: 0;

            text-align: center;

            font-size: 7px;
            color: #a0aec0;
            letter-spacing: 1px;
        }

    </style>
</head>

<body>

@php

    /*
    |--------------------------------------------------------------------------
    | Ambil 3 rekomendasi tertinggi
    |--------------------------------------------------------------------------
    */

    $top3 = collect($detailSkor)
        ->sortByDesc('persentase')
        ->take(3)
        ->values();

    $utama = $top3->get(0);
    $alternatif1 = $top3->get(1);
    $alternatif2 = $top3->get(2);

@endphp


<div class="page">

    <div class="certificate">

        <div class="certificate-inner">

            {{-- ORNAMEN --}}

            <div class="corner corner-tl"></div>
            <div class="corner corner-tr"></div>
            <div class="corner corner-bl"></div>
            <div class="corner corner-br"></div>


            {{-- HEADER --}}

            <div class="header">

                <div class="brand">
                    SIMPRODI
                </div>

                <div class="brand-subtitle">
                    SISTEM INFORMASI REKOMENDASI PROGRAM STUDI
                </div>

                <div class="ornament"></div>

                <div class="certificate-title">
                    SERTIFIKAT HASIL
                </div>

                <div class="certificate-subtitle">
                    TES MINAT & BAKAT
                </div>

            </div>


            {{-- SISWA --}}

            <div class="given">
                DIBERIKAN KEPADA
            </div>

            <div class="student-name">
                {{ $user->name }}
            </div>

            <div class="student-info">

                {{ $user->school_name }}

                @if($user->class_level)
                    &nbsp; • &nbsp; Kelas {{ $user->class_level }}
                @endif

            </div>


            {{-- KETERANGAN --}}

            <div class="statement">
                Berdasarkan hasil tes minat dan bakat yang telah diselesaikan,
                diperoleh rekomendasi program studi sebagai berikut:
            </div>


            {{-- REKOMENDASI UTAMA --}}

            @if($utama)

                <div class="main-result">

                    <div class="main-label">
                        REKOMENDASI UTAMA
                    </div>

                    <div class="main-major">
                        {{ $utama['nama_jurusan'] }}
                    </div>

                    <div class="main-score">
                        {{ $utama['persentase'] }}% Tingkat Kecocokan
                    </div>

                </div>

            @endif


            {{-- ALTERNATIF --}}

            @if($alternatif1 || $alternatif2)

                <div class="alternative-title">
                    REKOMENDASI ALTERNATIF
                </div>

                <table class="alternatives">

                    <tr>

                        @if($alternatif1)

                            <td class="alternative">

                                <div class="rank">
                                    02
                                </div>

                                <div class="alternative-major">
                                    {{ $alternatif1['nama_jurusan'] }}
                                </div>

                                <div class="alternative-score">
                                    {{ $alternatif1['persentase'] }}% Kecocokan
                                </div>

                            </td>

                        @endif


                        @if($alternatif2)

                            <td class="alternative">

                                <div class="rank">
                                    03
                                </div>

                                <div class="alternative-major">
                                    {{ $alternatif2['nama_jurusan'] }}
                                </div>

                                <div class="alternative-score">
                                    {{ $alternatif2['persentase'] }}% Kecocokan
                                </div>

                            </td>

                        @endif

                    </tr>

                </table>

            @endif


            {{-- FOOTER --}}

            <div class="footer">

                <div class="date">

                    Tanggal Tes:
                    <strong>
                        {{ \Carbon\Carbon::parse($hasil->tanggal_tes)->format('d F Y') }}
                    </strong>

                </div>


                <div class="signature">

                    <div class="signature-line">
                        SIMPRODI
                    </div>

                </div>

            </div>


            <div class="system">
                Dokumen ini diterbitkan secara otomatis oleh SIMPRODI
            </div>

        </div>

    </div>

</div>

</body>
</html>