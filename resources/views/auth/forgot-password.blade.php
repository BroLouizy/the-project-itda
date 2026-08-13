<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password</title>
</head>

<body>

    <h1>Lupa Password</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('password.email') }}" method="POST">

        @csrf

        <label>Email</label>
        <br>

        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
            required
        >

        <br><br>

        <button type="submit">
            Kirim Link Reset Password
        </button>

    </form>

    <br>

    <a href="/login">Kembali ke Login</a>

</body>
</html>