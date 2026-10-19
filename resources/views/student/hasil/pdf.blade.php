<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat SIMPRODI</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            color: #18243b;
        }

        .certificate-container {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 790px;
            overflow: hidden;
            background: #ffffff;
        }

        /* Background lembut (tanpa pita) */
        .bg-circle {
            position: absolute;
            border-radius: 50%;
        }

        .bg-top-left {
            top: -95px;
            left: -80px;
            width: 240px;
            height: 240px;
            background: #edf2fb;
        }

        .bg-bottom-right {
            right: -100px;
            bottom: -115px;
            width: 280px;
            height: 280px;
            background: #edf2fb;
        }

        .bg-top-right {
            top: -170px;
            right: -170px;
            width: 300px;
            height: 300px;
            background: #cdd3de;
        }

        .bg-bottom-left {
            bottom: -170px;
            left: -170px;
            width: 300px;
            height: 300px;
            background: #cdd3de;
        }

        /* Bingkai */
        .outer-border-frame {
            position: absolute;
            top: 15px;
            left: 20px;
            right: 20px;
            bottom: 15px;
            border: 2px solid #263c5d;
            border-radius: 16px;
            z-index: 5;
        }

        .inner-border-frame {
            position: absolute;
            top: 28px;
            left: 33px;
            right: 33px;
            bottom: 28px;
            border: 1px solid #c4ccd8;
            border-radius: 12px;
            background: #ffffff;
            z-index: 5;
        }

        /* Brand kiri atas */
        .header-brand {
            position: absolute;
            top: 60px;
            left: 68px;
            font-size: 19px;
            font-weight: 800;
            color: #263854;
            letter-spacing: 0.8px;
            z-index: 8;
        }

        .header-brand .brand-logo {
            height: 36px;
            width: auto;
            margin-right: 10px;
            vertical-align: middle;
        }

        .header-date {
            position: absolute;
            top: 75px;
            right: 68px;
            font-size: 13px;
            color: #4b5563;
            z-index: 8;
        }

        /* Konten */
        .content-body {
            position: absolute;
            top: 118px;
            left: 65px;
            right: 65px;
            text-align: center;
            z-index: 7;
        }

        .title-simprodi {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 70px;
            line-height: 1.05;
            font-weight: 900;
            letter-spacing: 1px;
            color: #21395e;
        }

        .subtitle-text {
            margin-top: 8px;
            font-size: 17px;
            color: #111827;
        }

        .given-to-label {
            margin-top: 22px;
            font-size: 17px;
            color: #111827;
        }

        .student-name {
            margin-top: 5px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 42px;
            line-height: 1.1;
            font-weight: 900;
            color: #21395e;
            text-transform: uppercase;
        }

        .student-detail {
            margin-top: 7px;
            font-size: 14px;
            color: #4b5563;
        }

        .recommendation-label {
            margin-top: 30px;
            font-size: 14px;
            letter-spacing: 1.8px;
            color: #263854;
        }

        .main-recommendation-title {
            margin-top: 7px;
            font-size: 34px;
            line-height: 1.15;
            font-weight: 900;
            color: #315d96;
        }

        .main-recommendation-score {
            margin-top: 7px;
            font-size: 20px;
            color: #315d96;
        }

        .alt-section-title {
            margin-top: 26px;
            font-size: 16px;
            font-weight: 800;
            color: #111827;
        }

        .alt-cards-wrapper {
            width: 470px;
            margin: 10px auto 0;
            display: table;
            table-layout: fixed;
            border-spacing: 20px 0;
        }

        .alt-card {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .alt-card-name {
            font-size: 15px;
            line-height: 1.25;
            font-weight: 800;
            color: #111827;
        }

        .alt-card-score {
            margin-top: 4px;
            font-size: 11px;
            color: #315d96;
        }

        .alt-progress-bg {
            width: 100%;
            height: 7px;
            margin-top: 6px;
            overflow: hidden;
            border-radius: 4px;
            background: #dfe5ef;
        }

        .alt-progress-fill {
            height: 7px;
            border-radius: 4px;
            background: #315d96;
        }

        /* Footer */
        .footer-signature {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 48px;
            text-align: center;
            z-index: 8;
        }

        .footer-signature-title {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            line-height: 1.1;
            font-weight: 900;
            color: #111827;
        }

        .footer-signature-sub {
            margin-top: 5px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 22px;
            color: #374151;
        }
    </style>
</head>

<body>

@php
    $top3 = collect($detailSkor)
        ->sortByDesc('persentase')
        ->take(3)
        ->values();

    $utama = $top3->get(0);
    $alternatif1 = $top3->get(1);
    $alternatif2 = $top3->get(2);
@endphp

<div class="certificate-container">

    <!-- Background sederhana, tanpa pita -->
    <div class="bg-circle bg-top-right"></div>
    <div class="bg-circle bg-bottom-left"></div>
    <div class="bg-circle bg-top-left"></div>
    <div class="bg-circle bg-bottom-right"></div>

    <!-- Bingkai -->
    <div class="outer-border-frame"></div>
    <div class="inner-border-frame"></div>

    <!-- Brand kiri atas -->
    <div class="header-brand">
        @if(file_exists(public_path('images/admin-avatar.png')))
            <img class="brand-logo" src="{{ public_path('images/admin-avatar.png') }}" alt="Logo ITDA">
        @endif
        SIMPRODI
    </div>

    <!-- Tanggal -->
    <div class="header-date">
        Diterbitkan: {{ \Carbon\Carbon::parse($hasil->tanggal_tes)->format('d F Y') }}
    </div>

    <div class="content-body">

        <h1 class="title-simprodi">SIMPRODI</h1>

        <div class="subtitle-text">
            Berdasarkan hasil tes identifikasi minat &amp; potensi program studi
        </div>

        <div class="given-to-label">Anda telah menyelesaikan seluruh rangkaian tes, Selamat kepada</div>

        <div class="student-name">
            {{ $user->name }}
        </div>

        <div class="student-detail">
            {{ $user->school_name ?? '-' }}
            &nbsp; • &nbsp;
            Kelas {{ $user->class_level ?? '-' }}
        </div>

        @if($utama)
            <div class="recommendation-label">
                ANDA DIREKOMENDASIKAN PADA JURUSAN
            </div>

            <div class="main-recommendation-title">
                {{ $utama['nama_jurusan'] }}
            </div>

            <div class="main-recommendation-score">
                {{ number_format((float) $utama['persentase'], 2) }}% Kecocokan
            </div>
        @endif

        <div class="alt-section-title">
            Rekomendasi Jurusan Alternatif
        </div>

        <div class="alt-cards-wrapper">
            @foreach([$alternatif1, $alternatif2] as $alt)
                @if($alt)
                    <div class="alt-card">
                        <div class="alt-card-name">
                            {{ $alt['nama_jurusan'] }}
                        </div>

                        <div class="alt-card-score">
                            {{ number_format((float) $alt['persentase'], 2) }}% Kecocokan
                        </div>

                        <div class="alt-progress-bg">
                            <div class="alt-progress-fill"
                                 style="width: {{ min(100, max(0, (float) $alt['persentase'])) }}%;"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-signature">
        <div class="footer-signature-title">Tim SIMPRODI</div>
        <div class="footer-signature-sub">Penyelenggara Tes</div>
    </div>

</div>

</body>
</html>