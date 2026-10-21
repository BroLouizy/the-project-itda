<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SIMPRODI</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🧭</text></svg>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-wrapper {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 680px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(23, 59, 112, 0.15);
        }

        /* ===== PANEL KIRI - BRANDING ===== */
        .brand-panel {
            flex: 0 0 38%;
            background: linear-gradient(160deg, #173b70 0%, #2c5cf5 100%);
            color: #fff;
            padding: 50px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -90px;
            right: -90px;
        }

        .brand-panel::after {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            bottom: -50px;
            left: -50px;
        }

        .brand-logo {
            width: 56px;
            height: 56px;
            background: rgba(255,255,255,0.15);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 24px;
            position: relative;
            z-index: 1;
        }

        .brand-panel h1 {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .brand-panel h2 {
            font-size: 14px;
            font-weight: 400;
            color: rgba(255,255,255,0.85);
            margin-bottom: 26px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }

        .brand-tagline {
            font-size: 16px;
            font-style: italic;
            font-weight: 500;
            color: #fff;
            border-left: 3px solid rgba(255,255,255,0.6);
            padding-left: 14px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
            margin-bottom: 36px;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 13px;
            position: relative;
            z-index: 1;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13.5px;
            color: rgba(255,255,255,0.9);
        }

        .brand-feature i {
            width: 28px;
            height: 28px;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* ===== PANEL KANAN - FORM ===== */
        .form-panel {
            flex: 1;
            padding: 45px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }

        .form-panel h3 {
            font-size: 24px;
            font-weight: 700;
            color: #173b70;
            margin-bottom: 4px;
        }

        .form-panel .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 13px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e2e6ee;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.2s;
            background: #f9fafc;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2c5cf5;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(44, 92, 245, 0.1);
        }

        select:disabled {
            background: #eef0f4;
            color: #9aa3b2;
            cursor: not-allowed;
        }

        .field-note {
            margin-top: 5px;
            font-size: 12px;
            color: #b00020;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 45px;
        }

        .password-wrapper input[type="password"]::-ms-reveal,
        .password-wrapper input[type="password"]::-ms-clear {
            display: none;
        }

        .password-wrapper input::-webkit-textfield-decoration-container {
            visibility: hidden;
        }

        .toggle-password {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password svg {
            width: 20px;
            height: 20px;
            stroke: #888;
            fill: none;
            stroke-width: 2;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #173b70, #2c5cf5);
            color: #fff;
            font-size: 15.5px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
            transition: 0.2s;
            box-shadow: 0 8px 20px rgba(44, 92, 245, 0.25);
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(44, 92, 245, 0.35);
        }

        .login {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
            color: #666;
        }

        .login a {
            color: #2c5cf5;
            font-weight: 700;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }

        .error {
            background: #fdeaea;
            color: #b00020;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13.5px;
            border-left: 4px solid #b00020;
        }

        .error ul {
            margin: 0;
            padding-left: 18px;
        }

        @media (max-width: 900px) {
            .brand-panel { display: none; }
            .form-panel { padding: 40px 30px; }
            .form-row { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

<div class="auth-wrapper">

    {{-- PANEL KIRI - BRANDING --}}
    <div class="brand-panel">
        <div class="brand-logo">
            <i class="fa-solid fa-compass"></i>
        </div>

        <h1>SIMPRODI</h1>
        <h2>Sistem Identifikasi Minat & Potensi Program Studi</h2>

        <p class="brand-tagline">
            "Temukan Program Studi yang Sesuai dengan Potensimu."
        </p>

        <div class="brand-features">
            <div class="brand-feature">
                <i class="fa-solid fa-brain"></i>
                Kenali minat dan potensi dirimu
            </div>
            <div class="brand-feature">
                <i class="fa-solid fa-chart-simple"></i>
                Dapatkan hasil analisis instan
            </div>
            <div class="brand-feature">
                <i class="fa-solid fa-graduation-cap"></i>
                Rekomendasi program studi tepat
            </div>
        </div>
    </div>

    {{-- PANEL KANAN - FORM REGISTER --}}
    <div class="form-panel">

        <h3>Buat Akun Baru</h3>
        <p class="subtitle">Isi data dirimu untuk memulai tes minat & bakat</p>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" id="registerForm">

            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nomor HP</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="081234567890"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                    >
                </div>
            </div>

            <div class="form-group">
                <label>Nama Sekolah</label>
                <input
                    type="text"
                    name="school_name"
                    value="{{ old('school_name') }}"
                    placeholder="Contoh: SMA Negeri 1 Yogyakarta"
                    required
                >
            </div>

            {{-- PROVINSI (dropdown seluruh Indonesia) --}}
            <div class="form-group" id="provinceGroup">
                <label for="province">Provinsi</label>
                <select name="province" id="province" required>
                    <option value="">-- Memuat provinsi... --</option>
                </select>
            </div>

            {{-- KABUPATEN / KOTA (menyesuaikan provinsi) --}}
            <div class="form-group" id="cityGroup">
                <label for="city">Kabupaten / Kota</label>
                <select name="city" id="city" required disabled>
                    <option value="">-- Pilih provinsi dulu --</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tipe Sekolah</label>

                    <select name="school_type" required>
                        <option value="">-- Pilih --</option>
                        <option value="SMA" {{ old('school_type') === 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="SMK" {{ old('school_type') === 'SMK' ? 'selected' : '' }}>SMK</option>
                        <option value="MA" {{ old('school_type') === 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="Lainnya" {{ old('school_type') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kelas</label>

                    <select name="class_level" required>
                        <option value="">-- Pilih --</option>
                        <option value="X" {{ old('class_level') === 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ old('class_level') === 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ old('class_level') === 'XII' ? 'selected' : '' }}>XII</option>
                        <option value="Lainnya" {{ old('class_level') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="majorSelect">Jurusan</label>

                <select id="majorSelect" required>
                    <option value="">-- Pilih Jurusan --</option>
                        <optgroup label="SMA / MA">
                            <option value="IPA (MIPA)">IPA (MIPA)</option>
                            <option value="IPS">IPS</option>
                            <option value="Bahasa dan Budaya">Bahasa dan Budaya</option>
                            <option value="Keagamaan (MA)">Keagamaan (MA)</option>
                        </optgroup>
                        <optgroup label="SMK - Teknologi Informasi">
                            <option value="Rekayasa Perangkat Lunak (RPL)">Rekayasa Perangkat Lunak (RPL)</option>
                            <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan (TKJ)</option>
                            <option value="Sistem Informatika, Jaringan dan Aplikasi (SIJA)">Sistem Informatika, Jaringan dan Aplikasi (SIJA)</option>
                            <option value="Desain Komunikasi Visual (DKV)">Desain Komunikasi Visual (DKV)</option>
                            <option value="Animasi">Animasi</option>
                            <option value="Broadcasting dan Perfilman">Broadcasting dan Perfilman</option>
                        </optgroup>
                        <optgroup label="SMK - Teknik Otomotif">
                            <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (TKR)</option>
                            <option value="Teknik dan Bisnis Sepeda Motor (TBSM)">Teknik dan Bisnis Sepeda Motor (TBSM)</option>
                            <option value="Teknik Alat Berat">Teknik Alat Berat</option>
                            <option value="Teknik Bodi Otomotif">Teknik Bodi Otomotif</option>
                        </optgroup>
                        <optgroup label="SMK - Teknik Elektro">
                            <option value="Teknik Instalasi Tenaga Listrik (TITL)">Teknik Instalasi Tenaga Listrik (TITL)</option>
                            <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
                            <option value="Teknik Audio Video">Teknik Audio Video</option>
                            <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                            <option value="Mekatronika">Mekatronika</option>
                        </optgroup>
                        <optgroup label="SMK - Teknik Mesin & Konstruksi">
                            <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                            <option value="Teknik Pengelasan">Teknik Pengelasan</option>
                            <option value="Teknik Fabrikasi Logam">Teknik Fabrikasi Logam</option>
                            <option value="Desain Pemodelan dan Informasi Bangunan (DPIB)">Desain Pemodelan dan Informasi Bangunan (DPIB)</option>
                            <option value="Teknik Konstruksi Batu dan Beton">Teknik Konstruksi Batu dan Beton</option>
                        </optgroup>
                        <optgroup label="SMK - Penerbangan & Maritim">
                            <option value="Teknik Pesawat Udara">Teknik Pesawat Udara</option>
                            <option value="Teknik Elektronika Pesawat Udara">Teknik Elektronika Pesawat Udara</option>
                            <option value="Nautika Kapal Niaga">Nautika Kapal Niaga</option>
                            <option value="Teknika Kapal Niaga">Teknika Kapal Niaga</option>
                            <option value="Perikanan">Perikanan</option>
                        </optgroup>
                        <optgroup label="SMK - Bisnis & Manajemen">
                            <option value="Akuntansi dan Keuangan Lembaga (AKL)">Akuntansi dan Keuangan Lembaga (AKL)</option>
                            <option value="Manajemen Perkantoran dan Layanan Bisnis (MPLB)">Manajemen Perkantoran dan Layanan Bisnis (MPLB)</option>
                            <option value="Bisnis Daring dan Pemasaran (BDP)">Bisnis Daring dan Pemasaran (BDP)</option>
                            <option value="Perbankan Syariah">Perbankan Syariah</option>
                        </optgroup>
                        <optgroup label="SMK - Pariwisata & Tata">
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Kuliner / Tata Boga">Kuliner / Tata Boga</option>
                            <option value="Tata Busana">Tata Busana</option>
                            <option value="Tata Kecantikan">Tata Kecantikan</option>
                            <option value="Usaha Layanan Wisata">Usaha Layanan Wisata</option>
                        </optgroup>
                        <optgroup label="SMK - Kesehatan">
                            <option value="Farmasi Klinis dan Komunitas">Farmasi Klinis dan Komunitas</option>
                            <option value="Asisten Keperawatan">Asisten Keperawatan</option>
                            <option value="Teknologi Laboratorium Medik">Teknologi Laboratorium Medik</option>
                            <option value="Dental Asisten">Dental Asisten</option>
                        </optgroup>
                        <optgroup label="SMK - Pertanian">
                            <option value="Agribisnis Tanaman">Agribisnis Tanaman</option>
                            <option value="Agribisnis Ternak">Agribisnis Ternak</option>
                            <option value="Agribisnis Pengolahan Hasil Pertanian">Agribisnis Pengolahan Hasil Pertanian</option>
                        </optgroup>
                        <optgroup label="SMK - Seni">
                            <option value="Seni Musik">Seni Musik</option>
                            <option value="Seni Tari">Seni Tari</option>
                            <option value="Seni Rupa">Seni Rupa</option>
                            <option value="Seni Karawitan">Seni Karawitan</option>
                        </optgroup>
                    <option value="Lainnya">Lainnya</option>
                </select>

                {{-- Muncul kalau memilih "Lainnya" --}}
                <input
                    type="text"
                    id="majorOther"
                    maxlength="100"
                    placeholder="Tulis jurusanmu"
                    style="display:none; margin-top:8px;"
                >

                {{-- Nilai yang dikirim ke server --}}
                <input type="hidden" name="major" id="major" value="{{ old('major') }}">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Minimal 8 karakter"
                            required
                        >

                        <span class="toggle-password" onclick="togglePassword('password', 'eyeIcon1')">
                            <svg id="eyeIcon1" viewBox="0 0 24 24">
                                <path d="M3 3l18 18"/>
                                <path d="M10.6 6.2A10.8 10.8 0 0 1 12 6c6.5 0 10 6 10 6a18 18 0 0 1-4.2 4.5"/>
                                <path d="M6.1 6.1C3.5 7.8 2 12 2 12s3.5 6 10 6c1.8 0 3.3-.4 4.6-1"/>
                                <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >

                        <span class="toggle-password" onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                            <svg id="eyeIcon2" viewBox="0 0 24 24">
                                <path d="M3 3l18 18"/>
                                <path d="M10.6 6.2A10.8 10.8 0 0 1 12 6c6.5 0 10 6 10 6a18 18 0 0 1-4.2 4.5"/>
                                <path d="M6.1 6.1C3.5 7.8 2 12 2 12s3.5 6 10 6c1.8 0 3.3-.4 4.6-1"/>
                                <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">
                Daftar Sekarang
            </button>

        </form>

        <div class="login">
            Sudah punya akun?
            <a href="/login">Login di sini</a>
        </div>

    </div>

</div>

<script>
    function togglePassword(inputId, iconId) {
        const password = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);

        if (password.type === 'password') {
            password.type = 'text';

            eyeIcon.innerHTML = `
                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
        } else {
            password.type = 'password';

            eyeIcon.innerHTML = `
                <path d="M3 3l18 18"/>
                <path d="M10.6 6.2A10.8 10.8 0 0 1 12 6c6.5 0 10 6 10 6a18 18 0 0 1-4.2 4.5"/>
                <path d="M6.1 6.1C3.5 7.8 2 12 2 12s3.5 6 10 6c1.8 0 3.3-.4 4.6-1"/>
                <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
            `;
        }
    }
</script>

{{-- DROPDOWN PROVINSI -> KABUPATEN/KOTA (data lokal: public/data/wilayah.json) --}}
@php
    $wilayahPath = public_path('data/wilayah.json');
    $wilayahJson = file_exists($wilayahPath) ? file_get_contents($wilayahPath) : '[]';
@endphp

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Data seluruh provinsi + kabupaten/kota se-Indonesia (dari file lokal)
    const WILAYAH = {!! $wilayahJson !!};

    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');

    // Nilai lama (kalau form kembali karena validasi gagal)
    const oldProvince = @json(old('province'));
    const oldCity = @json(old('city'));

    // Kalau data wilayah tidak ada, ganti dropdown jadi kolom ketik biasa
    // supaya form tetap bisa dipakai.
    function fallbackToText(select, placeholder, value) {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = select.name;
        input.id = select.id;
        input.required = true;
        input.placeholder = placeholder;
        input.value = value || '';
        select.replaceWith(input);
    }

    if (!Array.isArray(WILAYAH) || WILAYAH.length === 0) {
        fallbackToText(provinceSelect, 'Contoh: Daerah Istimewa Yogyakarta', oldProvince);
        fallbackToText(citySelect, 'Ketik kabupaten/kota', oldCity);
        return;
    }

    function fillCities(provinceName, selectedCity) {
        const province = WILAYAH.find(function (p) { return p.name === provinceName; });

        if (!province) {
            citySelect.innerHTML = '<option value="">-- Pilih provinsi dulu --</option>';
            citySelect.disabled = true;
            return;
        }

        citySelect.innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>';

        province.cities.forEach(function (city) {
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });

        citySelect.disabled = false;

        if (selectedCity) {
            citySelect.value = selectedCity;
        }
    }

    // Isi dropdown provinsi
    provinceSelect.innerHTML = '<option value="">-- Pilih Provinsi --</option>';

    WILAYAH.forEach(function (province) {
        const option = document.createElement('option');
        option.value = province.name;
        option.textContent = province.name;
        provinceSelect.appendChild(option);
    });

    // Kabupaten/kota menyesuaikan provinsi yang dipilih
    provinceSelect.addEventListener('change', function () {
        fillCities(provinceSelect.value, null);
    });

    // Pulihkan pilihan lama kalau ada
    if (oldProvince) {
        provinceSelect.value = oldProvince;
        fillCities(oldProvince, oldCity);
    }
});
</script>

{{-- DROPDOWN JURUSAN --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const majorSelect = document.getElementById('majorSelect');
    const majorOther = document.getElementById('majorOther');
    const majorHidden = document.getElementById('major');
    const form = document.getElementById('registerForm');

    const oldMajor = @json(old('major'));

    function syncMajor() {
        if (majorSelect.value === 'Lainnya') {
            majorOther.style.display = 'block';
            majorOther.required = true;
            majorHidden.value = majorOther.value.trim();
        } else {
            majorOther.style.display = 'none';
            majorOther.required = false;
            majorHidden.value = majorSelect.value;
        }
    }

    // Pulihkan pilihan lama (kalau form kembali karena validasi gagal)
    if (oldMajor) {
        const found = Array.from(majorSelect.options).some(function (o) {
            return o.value === oldMajor;
        });

        if (found) {
            majorSelect.value = oldMajor;
        } else {
            majorSelect.value = 'Lainnya';
            majorOther.value = oldMajor;
        }
    }

    majorSelect.addEventListener('change', syncMajor);
    majorOther.addEventListener('input', syncMajor);
    form.addEventListener('submit', syncMajor);

    syncMajor();
});
</script>

</body>
</html>