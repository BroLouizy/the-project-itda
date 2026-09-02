<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SIMPRODI</title>
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
            min-height: 580px;
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
        }

        /* ===== PANEL KANAN - FORM ===== */
        .form-panel {
            flex: 1;
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: #eaf0ff;
            color: #2c5cf5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 20px;
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
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
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

        .back {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .back a {
            color: #2c5cf5;
            font-weight: 700;
            text-decoration: none;
        }

        .back a:hover {
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
    </div>

    {{-- PANEL KANAN - FORM --}}
    <div class="form-panel">

        <div class="form-icon">
            <i class="fa-solid fa-key"></i>
        </div>

        <h3>Lupa Password?</h3>
        <p class="subtitle">Masukkan email yang terdaftar, kami akan kirimkan kode OTP untuk reset password kamu.</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" id="forgotForm">

            @csrf

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <button type="submit" class="btn">
                Kirim Kode OTP
            </button>

        </form>

        <div class="back">
            <a href="{{ route('login') }}">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Login
            </a>
        </div>

    </div>

</div>

<script>
    document.getElementById('forgotForm').addEventListener('submit', function () {
        const btn = this.querySelector('.btn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner"></span> Mengirim...';
    });
</script>

</body>
</html>