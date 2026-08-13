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

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >
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

</body>
</html>