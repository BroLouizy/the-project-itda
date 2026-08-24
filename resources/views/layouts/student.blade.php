<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Siswa')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* =========================
           HEADER
        ========================= */

        .top-header {
            width: 100%;
            height: 88px;
            background: #fff;
            border-bottom: 1px solid #e2e5e9;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .avatar-circle {
            width: 55px;
            height: 55px;
            min-width: 55px;
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

        .top-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .top-header small {
            color: #6c757d;
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout-wrapper {
            display: flex;
            flex-direction: row;
            width: 100%;
            min-height: calc(100vh - 88px);
            align-items: stretch;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 220px;
            min-width: 220px;
            max-width: 220px;
            background: #fff;
            border-right: 1px solid #e2e5e9;
            flex: 0 0 220px;
        }

        .sidebar-flex {
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 88px);
            height: 100%;
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

        /* =========================
           CONTENT
        ========================= */

        .main-content {
            flex: 1 1 auto;
            min-width: 0;
            width: calc(100% - 220px);
            padding: 30px;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}    
    <div class="top-header">

        <div class="avatar-circle">
            @if (auth()->user()->profile_photo)
                <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                    alt="Foto Profil"
                    style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            @else
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            @endif
        </div>

        <div>
            <h5>
                Selamat Datang, {{ auth()->user()->name }}!
            </h5>

            <small>
                {{ auth()->user()->school_name ?? '-' }}
                &middot;
                {{ auth()->user()->class_level ?? '-' }}
            </small>
        </div>

    </div>


    {{-- SIDEBAR + CONTENT --}}
    <div class="layout-wrapper">

        {{-- SIDEBAR --}}
        <div class="sidebar">

            <div class="sidebar-flex">

                <a href="{{ route('student.dashboard') }}"
                   class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-house"></i>
                    Home

                </a>


                <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}"
                   class="{{ request()->routeIs('tes.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-pen-to-square"></i>
                    Tes

                </a>


                <a href="{{ Route::has('hasil.tes') ? route('hasil.tes') : '#' }}"
                   class="{{ request()->routeIs('hasil.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-chart-simple"></i>
                    Hasil

                </a>


                <a href="{{ route('student.setting') }}"
                   class="{{ request()->routeIs('student.setting') ? 'active' : '' }}">

                    <i class="fa-solid fa-gear"></i>
                    Setting

                </a>


                <form method="POST"
                      action="{{ route('logout') }}"
                      class="logout-link">

                    @csrf

                    <button type="submit"
                            style="
                                border:none;
                                background:none;
                                width:100%;
                                text-align:left;
                                padding:16px 24px;
                                display:flex;
                                align-items:center;
                                gap:10px;
                                color:#dc3545;
                            ">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout

                    </button>

                </form>

            </div>

        </div>


        {{-- HOME / CONTENT --}}
        <div class="main-content">

            @yield('content')

        </div>

    </div>

</body>
</html>