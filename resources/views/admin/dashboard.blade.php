<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

    <h1>Dashboard Admin</h1>

    <h2>Selamat datang, {{ Auth::user()->name }}</h2>

    <p>
        Kamu berhasil login sebagai Admin.
    </p>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>