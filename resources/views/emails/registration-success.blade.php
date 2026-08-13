<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f4f7fb; padding:30px;">

    <div style="
        max-width:600px;
        margin:auto;
        background:white;
        padding:30px;
        border-radius:12px;
    ">

        <h2 style="color:#173b70;">
            Pendaftaran Berhasil 🎉
        </h2>

        <p>
            Halo <strong>{{ $user->name }}</strong>,
        </p>

        <p>
            Selamat! Akun kamu berhasil dibuat pada sistem
            <strong>Tes Minat & Bakat Program Studi</strong>.
        </p>

        <p>
            Email yang terdaftar:
            <strong>{{ $user->email }}</strong>
        </p>

        <p>
            Silakan gunakan email dan password yang telah kamu
            daftarkan untuk login ke sistem.
        </p>

        <p>
            Terima kasih telah melakukan pendaftaran.
        </p>

        <hr>

        <p style="color:#777; font-size:13px;">
            Email ini dikirim secara otomatis oleh sistem.
            Mohon tidak membalas email ini.
        </p>

    </div>

</body>
</html>