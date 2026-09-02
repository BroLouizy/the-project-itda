<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Siswa')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        :root {
            --bs-primary: #173b70;
            --bs-primary-rgb: 23, 59, 112;
        }

        .btn-primary {
            background: linear-gradient(135deg, #173b70, #2c5cf5) !important;
            border-color: #173b70 !important;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #12305c, #1f4fe0) !important;
        }

        .btn-outline-primary {
            color: #173b70 !important;
            border-color: #173b70 !important;
        }

        .btn-outline-primary:hover {
            background: #173b70 !important;
            color: #fff !important;
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

            /* =========================
               PAGE TRANSITION
            ========================= */

            animation: pageFadeIn 0.35s ease-in-out;
        }


        /* =========================
           PAGE FADE IN
        ========================= */

        @keyframes pageFadeIn {

            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================
           PAGE FADE OUT
        ========================= */

        body.page-leaving {

            animation: pageFadeOut 0.2s ease-in forwards;

        }

        @keyframes pageFadeOut {

            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-5px);
            }

        }


        /* =========================
           REDUCED MOTION
        ========================= */

        @media (prefers-reduced-motion: reduce) {

            body {
                animation: none;
            }

            body.page-leaving {
                animation: none;
            }

        }


        /* =========================
           HEADER
        ========================= */

        .top-header {

            width: 100%;
            height: 88px;

            background: #fff;

            border-bottom: 1px solid #e2e5e9;

            padding: 14px 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            position: sticky;
            top: 0;

            z-index: 1000;

            box-shadow: 0 1px 6px rgba(23, 59, 112, 0.05);

            position: relative;

        }


        .header-left {

            display: flex;
            align-items: center;

        }


        .brand-mini-text {

            font-weight: 800;

            color: #173b70;

            font-size: 24px;

            letter-spacing: 1.5px;

            position: absolute;

            left: 50%;

            transform: translateX(-50%);

        }


        .avatar-circle {

            width: 52px;
            height: 52px;

            min-width: 52px;

            border-radius: 50%;

            background: linear-gradient(135deg, #173b70, #2c5cf5);

            color: #fff;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 20px;

            font-weight: 600;

            margin-right: 14px;

            overflow: hidden;

        }


        .top-header h5 {

            margin: 0;

            font-weight: 700;

            color: #222;

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

            padding: 15px 24px;

            color: #444;

            text-decoration: none;

            border-bottom: 1px solid #f0f0f0;

            transition: 0.15s;

            font-size: 14.5px;

        }


        .sidebar a i {

            width: 18px;

            text-align: center;

            color: #999;

        }


        .sidebar a:hover {

            background: #f4f7fd;

        }


        .sidebar a.active {

            background: #eaf0ff;

            color: #173b70;

            font-weight: 700;

            border-left: 3px solid #2c5cf5;

        }


        .sidebar a.active i {

            color: #2c5cf5;

        }


        .sidebar .logout-link {

            margin-top: auto;

            color: #dc3545;

        }


        .sidebar .logout-link i {

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


        .card {

            border-radius: 14px !important;

        }

    </style>

</head>


<body>


    {{-- =========================
         HEADER
    ========================= --}}

    <div class="top-header">

        <div class="header-left">

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


        <span class="brand-mini-text">
            SIMPRODI
        </span>

    </div>



    {{-- =========================
         SIDEBAR + CONTENT
    ========================= --}}

    <div class="layout-wrapper">


        {{-- SIDEBAR --}}

        <div class="sidebar">

            <div class="sidebar-flex">


                {{-- HOME --}}

                <a href="{{ route('student.dashboard') }}"
                   class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-house"></i>

                    Home

                </a>



                {{-- TES --}}

                <a href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}"
                   class="{{ request()->routeIs('tes.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-pen-to-square"></i>

                    Tes

                </a>



                {{-- HASIL --}}

                <a href="{{ Route::has('hasil.tes') ? route('hasil.tes') : '#' }}"
                   class="{{ request()->routeIs('hasil.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-chart-simple"></i>

                    Hasil

                </a>



                {{-- PROFILE --}}

                <a href="{{ route('student.setting') }}"
                   class="{{ request()->routeIs('student.setting') ? 'active' : '' }}">

                    <i class="fa-solid fa-gear"></i>

                    Profile

                </a>



                {{-- LOGOUT --}}

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="logout-link">

                    @csrf

                    <button type="submit"
                            style="
                                border: none;
                                background: none;
                                width: 100%;
                                text-align: left;
                                padding: 15px 24px;
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                color: #dc3545;
                                font-size: 14.5px;
                            ">

                        <i class="fa-solid fa-right-from-bracket"></i>

                        Logout

                    </button>

                </form>


            </div>

        </div>



        {{-- =========================
             HOME / CONTENT
        ========================= --}}

        <div class="main-content">

            @yield('content')

        </div>


    </div>



    {{-- =========================
         PAGE TRANSITION SCRIPT
    ========================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const links = document.querySelectorAll('a[href]');


            links.forEach(function (link) {

                link.addEventListener('click', function (e) {

                    const href = this.getAttribute('href');
                    
                });

                });


                /* =========================
                LOGOUT TRANSITION
                ========================= */

                const logoutForms = document.querySelectorAll('form[action*="logout"]');

                logoutForms.forEach(function (form) {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();

                    document.body.classList.add('page-leaving');

                    setTimeout(function () {

                        form.submit();

                    }, 200);

                });

                });


                });
                </script>

</body>
</html>