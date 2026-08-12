<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
</head>
<body>

    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>

    <p>Ini adalah Dashboard Siswa.</p>

    <p>
        Kamu sudah berhasil login.
    </p>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>