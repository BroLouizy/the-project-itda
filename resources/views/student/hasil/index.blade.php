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
                 style="font-size: 13px; letter-spacing: 2px; font-weight: 600;">
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

                <div style="font-size: 12px; letter-spacing: 1px;">
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
        <div class="p-4 text-center">

            <div class="text-muted mb-2"
                 style="font-size: 13px; font-weight: 600; letter-spacing: 1px;">
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
                 style="height: 9px; max-width: 500px; border-radius: 10px;">

                <div class="progress-bar"
                     style="
                        width: {{ $utama['persentase'] }}%;
                        border-radius: 10px;
                     ">
                </div>

            </div>

        </div>

    </div>


    {{-- Alternatif --}}
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
                             style="height: 7px; border-radius: 10px;">

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
                             style="height: 7px; border-radius: 10px;">

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


    {{-- Keterangan --}}
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


    {{-- Tombol PDF --}}
        <div class="text-center mb-4">

            <a href="{{ route('student.hasil.pdf') }}"
            class="btn btn-primary px-4 py-2"
            style="border-radius: 10px;">

                <i class="fa-solid fa-file-pdf me-2"></i>
                Download Hasil PDF

            </a>

        </div>

@endsection