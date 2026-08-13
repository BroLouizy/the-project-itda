<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
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
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .header-left {
            display: flex;
            align-items: center;
        }
        .avatar-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #8e44ad;
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
        .badge-admin {
            background: #8e44ad;
            color: #fff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Wrapper sidebar + content */
        .layout-wrapper {
            display: flex;
            min-height: calc(100vh - 88px);
        }

        /* Sidebar kiri */
        .sidebar {
            width: 240px;
            background: #fff;
            border-right: 1px solid #e2e5e9;
            flex-shrink: 0;
        }
        .sidebar-flex {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .sidebar a, .sidebar button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 16px 24px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #f0f0f0;
            transition: 0.15s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-size: 15px;
        }
        .sidebar a:hover, .sidebar button:hover {
            background: #f4f6f9;
        }
        .sidebar a.active {
            background: #f3ecfb;
            color: #8e44ad;
            font-weight: 600;
            border-left: 3px solid #8e44ad;
        }
        .sidebar .logout-form {
            margin-top: auto;
        }
        .sidebar .logout-form button {
            color: #dc3545;
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
        <div class="header-left">
            <div class="avatar-circle">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h5>{{ auth()->user()->name }}</h5>
                <small>Administrator</small>
            </div>
        </div>
        <span class="badge-admin"><i class="fa-solid fa-user-shield"></i> Admin</span>
    </div>

    <div class="layout-wrapper">
        <div class="sidebar">
            <div class="sidebar-flex">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="#" class="{{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i> Kelola Siswa
                </a>
                <a href="#" class="{{ request()->routeIs('admin.pertanyaan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-clipboard-question"></i> Kelola Pertanyaan
                </a>
                <a href="#" class="{{ request()->routeIs('admin.hasil*') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-simple"></i> Hasil Tes Siswa
                </a>

                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit">
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