<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMPRODI</title>
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
            max-width: 1000px;
            min-height: 620px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(23, 59, 112, 0.15);
        }

        /* ===== PANEL KIRI - BRANDING ===== */
        .brand-panel {
            flex: 1;
            background: linear-gradient(160deg, #173b70 0%, #2c5cf5 100%);
            color: #fff;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -100px;
            right: -100px;
        }

        .brand-panel::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            bottom: -60px;
            left: -60px;
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
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .brand-panel h2 {
            font-size: 15px;
            font-weight: 400;
            color: rgba(255,255,255,0.85);
            margin-bottom: 28px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }

        .brand-tagline {
            font-size: 17px;
            font-style: italic;
            font-weight: 500;
            color: #fff;
            border-left: 3px solid rgba(255,255,255,0.6);
            padding-left: 16px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
            margin-bottom: 40px;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 14px;
            position: relative;
            z-index: 1;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: rgba(255,255,255,0.9);
        }

        .brand-feature i {
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        /* ===== PANEL KANAN - FORM ===== */
        .form-panel {
            flex: 1;
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-panel h3 {
            font-size: 26px;
            font-weight: 700;
            color: #173b70;
            margin-bottom: 6px;
        }

        .form-panel .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 13px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1.5px solid #e2e6ee;
            border-radius: 10px;
            font-size: 14.5px;
            transition: 0.2s;
            background: #f9fafc;
        }

        input:focus {
            outline: none;
            border-color: #2c5cf5;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(44, 92, 245, 0.1);
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
            margin-top: 6px;
            transition: 0.2s;
            box-shadow: 0 8px 20px rgba(44, 92, 245, 0.25);
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(44, 92, 245, 0.35);
        }

        .btn:disabled {
            opacity: 0.75;
            cursor: not-allowed;
            transform: none;
        }

        .spinner {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid rgba(255,255,255,0.4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin-right: 6px;
            vertical-align: middle;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .register,
        .forgot-password {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #666;
        }

        .register a,
        .forgot-password a {
            color: #2c5cf5;
            font-weight: 700;
            text-decoration: none;
        }

        .register a:hover,
        .forgot-password a:hover {
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

        .success {
            background: #e8f7ec;
            color: #187a35;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13.5px;
            border-left: 4px solid #187a35;
        }

        @media (max-width: 850px) {
            .brand-panel { display: none; }
            .form-panel { padding: 45px 30px; }
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

    {{-- PANEL KANAN - FORM LOGIN --}}
    <div class="form-panel">

        <h3>Selamat Datang Kembali</h3>
        <p class="subtitle">Masuk untuk melanjutkan tes minat & bakatmu</p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST" id="loginForm">

            @csrf

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
                <label>Password</label>

                <div class="password-wrapper">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <span class="toggle-password" onclick="togglePassword()">
                        <svg id="eyeIcon" viewBox="0 0 24 24">
                            <path d="M3 3l18 18"/>
                            <path d="M10.6 6.2A10.8 10.8 0 0 1 12 6c6.5 0 10 6 10 6a18 18 0 0 1-4.2 4.5"/>
                            <path d="M6.1 6.1C3.5 7.8 2 12 2 12s3.5 6 10 6c1.8 0 3.3-.4 4.6-1"/>
                            <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
                        </svg>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn">
                Masuk
            </button>

        </form>

        <div class="forgot-password">
            <a href="{{ route('password.request') }}">
                Lupa password?
            </a>
        </div>

        <div class="register">
            Belum punya akun?
            <a href="/register">Daftar sekarang</a>
        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

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

    document.getElementById('loginForm').addEventListener('submit', function () {
        const btn = this.querySelector('.btn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner"></span> Memproses...';
    });
</script>

</body>
</html>