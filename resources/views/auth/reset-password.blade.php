<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Password Baru</title>

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

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            width: 100%;
            margin-top: 25px;
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
    </style>
</head>

<body>

<div class="container">

    <h1>Password Baru</h1>

    <p>
        Silakan buat password baru untuk akun Anda.
    </p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">

        @csrf

        <label>Password Baru</label>

        <input
            type="password"
            name="password"
            placeholder="Masukkan password baru"
            required
        >

        <label>Konfirmasi Password</label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Masukkan ulang password"
            required
        >

        <button type="submit">
            Simpan Password Baru
        </button>

    </form>

</div>

</body>

</html>