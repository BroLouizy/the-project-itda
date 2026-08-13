<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password - Tes Minat & Bakat</title>

    <style>
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
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            margin-bottom: 20px;
        }

        button {
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

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .back {
            text-align: center;
            margin-top: 20px;
        }

        .back a {
            color: #173b70;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Lupa Password</h1>

    <p class="subtitle">
        Masukkan email yang terdaftar
    </p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">

        @csrf

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
            value="{{ old('email') }}"
            required
        >

        <button type="submit">
            Kirim Kode OTP
        </button>

    </form>

    <div class="back">
        <a href="{{ route('login') }}">
            Kembali ke Login
        </a>
    </div>

</div>

</body>

</html>