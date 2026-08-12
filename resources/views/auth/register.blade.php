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

            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >
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

</body>
</html>