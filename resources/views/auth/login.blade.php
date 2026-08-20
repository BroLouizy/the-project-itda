<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Tes Minat & Bakat</title>

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
            width: 450px;
            max-width: 95%;
            margin: 80px auto;
            background: white;
            padding: 40px;
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
            margin-bottom: 20px;
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

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
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

        .register {
            text-align: center;
            margin-top: 20px;
        }

        .register a {
            color: #173b70;
            font-weight: bold;
            text-decoration: none;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #173b70;
            text-decoration: none;
            font-weight: bold;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #e5f7e9;
            color: #187a35;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Login</h1>

    <p class="subtitle">
        Tes Minat & Bakat Program Studi
    </p>

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

    <form action="/login" method="POST">

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
            Login
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
</script>

</body>
</html>