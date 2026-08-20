<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - Tes Minat & Bakat</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
        }

        .container {
            width: 700px;
            max-width: 95%;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #173b70;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #173b70;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 45px;
        }

        /* MATIKAN ikon mata bawaan browser (Edge & Chrome) */
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
            width: 22px;
            height: 22px;
            stroke: #555;
            fill: none;
            stroke-width: 2;
        }

        .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #173b70;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #102d56;
        }

        .login {
            text-align: center;
            margin-top: 20px;
        }

        .login a {
            color: #173b70;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Daftar Akun</h1>

    <p class="subtitle">
        Tes Minat & Bakat Program Studi
    </p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">

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

        <div class="form-group">
            <label>Nomor HP</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="Contoh: 081234567890"
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

        <div class="form-group">
            <label>Provinsi</label>
            <input
                type="text"
                name="province"
                value="{{ old('province') }}"
                placeholder="Contoh: Daerah Istimewa Yogyakarta"
                required
            >
        </div>

        <div class="form-group">
            <label>Tipe Sekolah</label>

            <select name="school_type" required>
                <option value="">-- Pilih Tipe Sekolah --</option>
                <option value="SMA">SMA</option>
                <option value="SMK">SMK</option>
                <option value="MA">MA</option>
                <option value="MAK">MAK</option>
            </select>
        </div>

        <div class="form-group">
            <label>Kelas</label>

            <select name="class_level" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jurusan</label>

            <input
                type="text"
                name="major"
                value="{{ old('major') }}"
                placeholder="Contoh: IPA, IPS, TKJ, RPL"
                required
            >
        </div>

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

        <button type="submit" class="btn">
            Daftar
        </button>

    </form>

    <div class="login">
        Sudah punya akun?
        <a href="/login">Login di sini</a>
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

</body>
</html>