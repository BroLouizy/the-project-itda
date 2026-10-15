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

    $user = Auth::user();
@endphp

{{-- =====================================================
     HALAMAN HASIL TES
===================================================== --}}

<div class="container-fluid py-3">

    {{-- HASIL UTAMA --}}
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;overflow:hidden;">

        <div style="
            background:linear-gradient(135deg,#173b73,#315fe8);
            color:white;
            padding:35px 30px;
            text-align:center;
        ">

            <div class="mb-2"
                 style="font-size:13px;letter-spacing:2px;font-weight:600;">
                HASIL TES
            </div>

            <h1 class="fw-bold mb-2">
                Tes Minat &amp; Bakat
            </h1>

            <p class="mb-4 opacity-75">
                Selamat! Kamu telah menyelesaikan seluruh rangkaian tes.
            </p>

            <div style="
                background:rgba(255,255,255,0.12);
                border-radius:14px;
                padding:18px;
                max-width:500px;
                margin:auto;
            ">

                <div style="font-size:12px;letter-spacing:1px;">
                    DIBERIKAN KEPADA
                </div>

                <h3 class="fw-bold mt-2 mb-1">
                    {{ $user->name }}
                </h3>

                <div>
                    {{ $user->school_name ?? '-' }}
                    • Kelas {{ $user->class_level ?? '-' }}
                </div>

            </div>
        </div>

        {{-- REKOMENDASI UTAMA --}}
        @if($utama)
            <div class="p-4 text-center">

                <div class="text-muted mb-2"
                     style="font-size:13px;font-weight:600;letter-spacing:1px;">
                    REKOMENDASI UTAMA
                </div>

                <h2 class="fw-bold text-primary mb-2">
                    🥇 {{ $utama['nama_jurusan'] }}
                </h2>

                <div class="fw-bold" style="font-size:20px;">
                    {{ $utama['persentase'] }}% Kecocokan
                </div>

                <div class="progress mx-auto mt-3"
                     style="height:9px;max-width:500px;border-radius:10px;">

                    <div class="progress-bar"
                         style="width:{{ min((float) $utama['persentase'], 100) }}%;border-radius:10px;">
                    </div>

                </div>
            </div>
        @endif

    </div>

    {{-- REKOMENDASI ALTERNATIF --}}
    <div class="card border-0 shadow-sm p-4 mb-4"
         style="border-radius:20px;">

        <h5 class="fw-bold text-center mb-4">
            Rekomendasi Program Studi Alternatif
        </h5>

        <div class="row g-4 justify-content-center">

            @foreach([$alternatif1, $alternatif2] as $i => $alt)
                @if($alt)
                    <div class="col-md-5">
                        <div class="border rounded-4 p-4 text-center h-100">

                            <div class="fw-bold mb-2" style="font-size:22px;">
                                {{ $i === 0 ? '🥈' : '🥉' }}
                            </div>

                            <h5 class="fw-bold mb-2">
                                {{ $alt['nama_jurusan'] }}
                            </h5>

                            <div class="text-primary fw-bold">
                                {{ $alt['persentase'] }}% Kecocokan
                            </div>

                            <div class="progress mt-3"
                                 style="height:7px;border-radius:10px;">

                                <div class="progress-bar"
                                     style="width:{{ min((float) $alt['persentase'], 100) }}%;border-radius:10px;">
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    {{-- KETERANGAN HASIL --}}
    <div class="card border-0 shadow-sm p-4 mb-4"
         style="border-radius:20px;">

        <h6 class="fw-bold mb-2">
            Tentang Hasil Tes
        </h6>

        <p class="text-muted mb-0">
            Hasil tes ini merupakan rekomendasi berdasarkan jawaban
            yang kamu berikan selama mengikuti tes minat dan bakat.
            Rekomendasi utama menunjukkan program studi dengan tingkat
            kecocokan tertinggi, sedangkan dua lainnya merupakan
            alternatif yang juga sesuai dengan hasil tes kamu.
        </p>

    </div>

    {{-- TOMBOL DOWNLOAD --}}
    <div class="text-center mb-4">

        <button type="button"
                id="downloadCertificate"
                class="btn btn-primary px-4 py-2"
                style="border-radius:10px;">

            <i class="fa-solid fa-download me-2"></i>
            Download Sertifikat PNG

        </button>

    </div>

</div>

{{-- =====================================================
     TEMPLATE SERTIFIKAT PNG (1123 x 794)
     Ada logo di tengah atas, tanpa pita
===================================================== --}}

<div id="certificateWrapper"
     style="position:fixed;left:-15000px;top:0;width:1123px;height:794px;overflow:hidden;">

    <div id="certificate"
         style="position:relative;box-sizing:border-box;width:1123px;height:794px;
                background:#ffffff;color:#18243b;font-family:Arial,Helvetica,sans-serif;
                overflow:hidden;">

        {{-- BINGKAI + BACKGROUND SUDUT --}}
        <div style="position:absolute;top:15px;left:20px;right:20px;bottom:15px;
                    border:2px solid #263c5d;border-radius:16px;overflow:hidden;background:#ffffff;">

            {{-- lingkaran lembut --}}
            <div style="position:absolute;top:-95px;left:-80px;width:240px;height:240px;
                        border-radius:50%;background:#edf2fb;"></div>
            <div style="position:absolute;right:-100px;bottom:-115px;width:280px;height:280px;
                        border-radius:50%;background:#edf2fb;"></div>

            {{-- bentuk diagonal abu-abu di sudut kanan atas & kiri bawah --}}
            <div style="position:absolute;top:-220px;right:-220px;width:360px;height:360px;
                        background:#c5ccd8;transform:rotate(45deg);"></div>
            <div style="position:absolute;bottom:-220px;left:-220px;width:360px;height:360px;
                        background:#c5ccd8;transform:rotate(45deg);"></div>

            {{-- panel putih tengah --}}
            <div style="position:absolute;top:13px;left:13px;right:13px;bottom:13px;
                        border-radius:22px;background:#ffffff;"></div>
        </div>

        {{-- LOGO TENGAH ATAS --}}
        <div style="position:absolute;top:26px;left:0;right:0;text-align:center;">
            <img src="{{ asset('images/logo-itda.png') }}"
                 alt="Logo"
                 style="width:62px;height:62px;object-fit:contain;">
        </div>

        {{-- BRAND KIRI ATAS --}}
        <div style="position:absolute;top:60px;left:68px;font-size:19px;font-weight:800;
                    color:#263854;letter-spacing:.8px;line-height:36px;">
            <span style="display:inline-block;position:relative;width:36px;height:36px;
                         margin-right:10px;vertical-align:middle;border-radius:11px;background:#263d61;">
                <span style="position:absolute;left:9px;top:9px;width:14px;height:14px;
                             border:2px solid #ffffff;border-radius:50%;"></span>
            </span>SIMPRODI
        </div>

        {{-- TANGGAL KANAN ATAS --}}
        <div style="position:absolute;top:75px;right:68px;font-size:13px;color:#4b5563;">
            Diterbitkan: {{ \Carbon\Carbon::parse($hasil->tanggal_tes)->format('d F Y') }}
        </div>

        {{-- KONTEN --}}
        <div style="position:absolute;top:118px;left:65px;right:65px;text-align:center;">

            <div style="font-family:Georgia,'Times New Roman',serif;font-size:70px;line-height:1.05;
                        font-weight:900;letter-spacing:1px;color:#21395e;">
                SIMPRODI
            </div>

            <div style="margin-top:8px;font-size:17px;color:#374151;">
                Selamat! Kamu telah menyelesaikan seluruh rangkaian tes
            </div>

            <div style="margin-top:22px;font-size:14px;letter-spacing:2px;color:#4b5563;">
                DIBERIKAN KEPADA
            </div>

            <div style="margin-top:5px;font-family:Georgia,'Times New Roman',serif;font-size:42px;
                        line-height:1.1;font-weight:900;color:#21395e;text-transform:uppercase;">
                {{ $user->name }}
            </div>

            <div style="margin-top:7px;font-size:14px;color:#4b5563;">
                {{ $user->school_name ?? '-' }} &nbsp;•&nbsp; Kelas {{ $user->class_level ?? '-' }}
            </div>

            @if($utama)
                <div style="margin-top:30px;font-size:14px;letter-spacing:1.8px;color:#263854;">
                    ANDA DIREKOMENDASIKAN PADA JURUSAN
                </div>

                <div style="margin-top:7px;font-size:34px;line-height:1.15;font-weight:900;color:#315d96;">
                    {{ $utama['nama_jurusan'] }}
                </div>

                <div style="margin-top:7px;font-size:20px;color:#315d96;">
                    {{ number_format((float) $utama['persentase'], 2) }}% Kecocokan
                </div>
            @endif

            <div style="margin-top:26px;font-size:16px;font-weight:800;color:#111827;">
                Rekomendasi Jurusan Alternatif
            </div>

            <div style="width:470px;margin:10px auto 0;display:table;table-layout:fixed;border-spacing:20px 0;">
                @foreach([$alternatif1, $alternatif2] as $alt)
                    @if($alt)
                        <div style="display:table-cell;width:50%;text-align:center;vertical-align:top;">
                            <div style="font-size:15px;font-weight:800;color:#111827;">
                                {{ $alt['nama_jurusan'] }}
                            </div>
                            <div style="margin-top:4px;font-size:11px;color:#315d96;">
                                {{ number_format((float) $alt['persentase'], 2) }}% Kecocokan
                            </div>
                            <div style="width:100%;height:7px;margin-top:6px;overflow:hidden;
                                        border-radius:4px;background:#dfe5ef;">
                                <div style="height:7px;border-radius:4px;background:#315d96;
                                            width:{{ min(100, max(0, (float) $alt['persentase'])) }}%;"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- FOOTER --}}
        <div style="position:absolute;left:0;right:0;bottom:48px;text-align:center;">
            <div style="font-family:Georgia,'Times New Roman',serif;font-size:34px;line-height:1.1;
                        font-weight:900;color:#111827;">
                Tim SIMPRODI
            </div>
            <div style="margin-top:5px;font-family:Georgia,'Times New Roman',serif;font-size:22px;color:#374151;">
                Penyelenggara Tes
            </div>
        </div>

    </div>
</div>

{{-- =====================================================
     HTML2CANVAS
===================================================== --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('downloadCertificate');
    const certificate = document.getElementById('certificate');

    if (!button || !certificate) {
        return;
    }

    button.addEventListener('click', async function () {

        const originalText = button.innerHTML;

        try {

            if (typeof html2canvas === 'undefined') {
                throw new Error('Library html2canvas belum berhasil dimuat.');
            }

            button.disabled = true;

            button.innerHTML = `
                <i class="fa-solid fa-spinner fa-spin me-2"></i>
                Membuat Sertifikat...
            `;

            // Tunggu logo selesai dimuat (maks 4 detik). Kalau gagal dimuat, logo disembunyikan
            // supaya proses download tidak macet.
            const images = Array.from(certificate.querySelectorAll('img'));

            await Promise.all(images.map(function (img) {

                return new Promise(function (resolve) {

                    if (img.complete) {
                        if (img.naturalWidth === 0) {
                            img.style.display = 'none';
                        }
                        return resolve();
                    }

                    const timer = setTimeout(function () {
                        img.style.display = 'none';
                        resolve();
                    }, 4000);

                    img.onload = function () {
                        clearTimeout(timer);
                        resolve();
                    };

                    img.onerror = function () {
                        clearTimeout(timer);
                        img.style.display = 'none';
                        resolve();
                    };
                });

            }));

            const canvas = await html2canvas(certificate, {
                width: 1123,
                height: 794,
                scale: 2,
                backgroundColor: '#ffffff',
                useCORS: true,
                logging: false
            });

            const image = canvas.toDataURL('image/png');

            const link = document.createElement('a');

            link.download = 'Hasil-Tes-SIMPRODI.png';
            link.href = image;

            document.body.appendChild(link);
            link.click();
            link.remove();

        } catch (error) {

            console.error('Gagal membuat sertifikat PNG:', error);

            alert(
                'Sertifikat gagal dibuat. Periksa koneksi internet dan pastikan logo dapat dimuat, lalu coba lagi.'
            );

        } finally {

            button.disabled = false;
            button.innerHTML = originalText;

        }

    });

});
</script>

@endsection