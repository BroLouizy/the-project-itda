<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Siswa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* Header atas */
        .top-header {
            background: #fff;
            border-bottom: 1px solid #e2e5e9;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .avatar-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #2c3e50;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 600;
            margin-right: 16px;
        }
        .top-header h5 { margin: 0; font-weight: 700; }
        .top-header small { color: #6c757d; }

        /* Wrapper sidebar + content */
        .layout-wrapper {
            display: flex;
            min-height: calc(100vh - 88px);
        }

        /* Sidebar kiri */
        .sidebar {
            width: 220px;
            background: #fff;
            border-right: 1px solid #e2e5e9;
            flex-shrink: 0;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 16px 24px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #f0f0f0;
            transition: 0.15s;
        }
        .sidebar a:hover {
            background: #f4f6f9;
        }
        .sidebar a.active {
            background: #e9f0ff;
            color: #2c5cf5;
            font-weight: 600;
            border-left: 3px solid #2c5cf5;
        }
        .sidebar .logout-link {
            margin-top: auto;
            color: #dc3545;
        }
        .sidebar-flex {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Konten kanan */
        .main-content {
            flex: 1;
            padding: 30px;
        }
    </style>
</head>
<body>

    <div class="top-header">
        <div class="avatar-circle">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <div>
            <h5>Selamat Datang, {{ auth()->user()->name }}!</h5>
            <small>{{ auth()->user()->school_name ?? '-' }} &middot; {{ auth()->user()->class_level ?? '-' }}</small>
        </div>
    </div>

    <div class="layout-wrapper">
        <div class="sidebar">
            <div class="sidebar-flex">
                <a href="{{ route('student.dashboard') }}" class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}" class="{{ request()->routeIs('tes.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-pen-to-square"></i> Tes
                </a>
                <a href="{{ Route::has('hasil.tes') ? route('hasil.tes') : '#' }}" class="{{ request()->routeIs('hasil.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-simple"></i> Hasil
                </a>

                <form method="POST" action="{{ route('logout') }}" class="logout-link">
                    @csrf
                    <button type="submit" style="border:none; background:none; width:100%; text-align:left; padding:16px 24px; display:flex; align-items:center; gap:10px; color:#dc3545;">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>

</body>
</html>