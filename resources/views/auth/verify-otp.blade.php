<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi OTP</title>

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

        p {
            text-align: center;
            color: #777;
        }

        input {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 24px;
            text-align: center;
            letter-spacing: 8px;
            margin: 20px 0;
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
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 12px;
            border-radius: 8px;
        }

        .success {
            background: #e5f7e9;
            color: #187a35;
            padding: 12px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Verifikasi OTP</h1>

    <p>
        Masukkan kode OTP yang dikirim ke email Anda.
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

    <form action="{{ route('password.verify') }}" method="POST">

        @csrf

        <input
            type="text"
            name="otp"
            maxlength="6"
            placeholder="000000"
            required
        >

        <button type="submit">
            Verifikasi OTP
        </button>

    </form>

</div>

</body>

</html>