<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kode OTP Reset Password</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f4f7fb; padding: 30px;">

    <div style="
        max-width: 500px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
    ">

        <h2 style="color: #173b70;">
            Reset Password
        </h2>

        <p>
            Anda meminta untuk melakukan reset password akun
            SIMPRODI.
        </p>

        <p>
            Gunakan kode OTP berikut:
        </p>

        <div style="
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 8px;
            color: #173b70;
            padding: 20px;
            background: #f4f7fb;
            border-radius: 10px;
        ">
            {{ $otp }}
        </div>

        <p>
            Kode OTP ini berlaku selama <strong>10 menit</strong>.
        </p>

        <p>
            Jika Anda tidak meminta reset password,
            abaikan email ini.
        </p>

        <p>
            Terima kasih.
        </p>

    </div>

</body>
</html>