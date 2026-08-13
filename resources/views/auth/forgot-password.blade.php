<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #2c3e50, #4a6fa5);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .auth-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .auth-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #eaf0ff;
            color: #2c5cf5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
        }
        .auth-card h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .auth-card p.subtitle {
            text-align: center;
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 24px;
        }
        .form-label {
            font-weight: 600;
            font-size: 14px;
        }
        .btn-submit {
            background: #2c5cf5;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-submit:hover {
            background: #1e46c9;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover {
            color: #2c5cf5;
        }
    </style>
</head>
<body>

    <div class="auth-card">

        <div class="auth-icon">
            <i class="fa-solid fa-key"></i>
        </div>

        <h4>Lupa Password?</h4>
        <p class="subtitle">Masukkan email kamu, kami akan kirimkan link untuk reset password.</p>

        @if (session('success'))
            <div class="alert alert-success py-2">
                <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger py-2">
                <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="nama@email.com"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn-submit w-100 text-white">
                <i class="fa-solid fa-paper-plane me-1"></i> Kirim Link Reset Password
            </button>
        </form>

        <a href="/login" class="back-link">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Login
        </a>

    </div>

</body>
</html>