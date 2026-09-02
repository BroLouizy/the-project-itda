<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin')</title>

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

        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        /* =========================
           PAGE TRANSITION
        ========================= */

        body {
            animation: pageFadeIn 0.35s ease-in-out;
        }

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

        @media (prefers-reduced-motion: reduce) {
            body {
                animation: none;
            }

            body.page-leaving {
                animation: none;
            }
        }

        /* =========================
           TOAST NOTIFICATION
        ========================= */

        .toast-notification {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: #fff;
            padding: 16px 18px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            min-width: 320px;
            max-width: 400px;
            animation: toastSlideIn 0.35s ease forwards;
            border-left: 4px solid #198754;
        }

        .toast-notification.toast-hide {
            animation: toastSlideOut 0.3s ease forwards;
        }

        .toast-success .toast-icon {
            background: #e8f7ec;
            color: #198754;
        }

        .toast-error {
            border-left-color: #dc3545;
        }

        .toast-error .toast-icon {
            background: #fdeaea;
            color: #dc3545;
        }

        .toast-icon {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .toast-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            font-size: 13.5px;
        }

        .toast-content strong {
            font-size: 14px;
            margin-bottom: 2px;
            color: #222;
        }

        .toast-content span {
            color: #666;
        }

        .toast-close {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 13px;
            padding: 2px;
            line-height: 1;
        }

        .toast-close:hover {
            color: #333;
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes toastSlideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(40px);
            }
        }

        /* =========================
           HEADER ATAS
        ========================= */

        .top-header {
            background: #fff;
            border-bottom: 1px solid #e2e5e9;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
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
            border-radius: 50%;
            background: linear-gradient(135deg, #173b70, #2c5cf5);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
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

        .badge-admin {
            background: linear-gradient(135deg, #173b70, #2c5cf5);
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(44, 92, 245, 0.25);
        }

        /* =========================
           WRAPPER SIDEBAR + CONTENT
        ========================= */

        .layout-wrapper {
            display: flex;
            min-height: calc(100vh - 88px);
        }

        /* =========================
           SIDEBAR KIRI
        ========================= */

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

        .sidebar a,
        .sidebar button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 24px;
            color: #444;
            text-decoration: none;
            border-bottom: 1px solid #f0f0f0;
            transition: 0.15s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-size: 14.5px;
        }

        .sidebar a i,
        .sidebar button i {
            width: 18px;
            text-align: center;
            color: #999;
        }

        .sidebar a:hover,
        .sidebar button:hover {
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

        .sidebar .logout-form {
            margin-top: auto;
        }

        .sidebar .logout-form button {
            color: #dc3545;
        }

        .sidebar .logout-form button i {
            color: #dc3545;
        }

        /* =========================
           KONTEN KANAN
        ========================= */

        .main-content {
            flex: 1;
            padding: 30px;
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

                <img src="{{ asset('images/admin-avatar.png') }}"
                     alt="Foto Admin"
                     style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">

            </div>

            <div>

                <h5>{{ auth()->user()->name }}</h5>

                <small>Administrator</small>

            </div>

        </div>

        <span class="brand-mini-text">
            SIMPRODI
        </span>

        <span class="badge-admin">
            <i class="fa-solid fa-user-shield"></i>
            Admin
        </span>

    </div>


    {{-- =========================
         SIDEBAR + CONTENT
    ========================= --}}

    <div class="layout-wrapper">

        {{-- SIDEBAR --}}

        <div class="sidebar">

            <div class="sidebar-flex">

                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-house"></i>
                    Home

                </a>


                <a href="{{ route('admin.siswa.index') }}"
                   class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-users"></i>
                    Kelola Siswa

                </a>


                <a href="#"
                   class="{{ request()->routeIs('admin.pertanyaan.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-clipboard-question"></i>
                    Kelola Pertanyaan

                </a>


                <a href="#"
                   class="{{ request()->routeIs('admin.hasil.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-chart-simple"></i>
                    Hasil Tes Siswa

                </a>


                <form method="POST"
                      action="{{ route('logout') }}"
                      class="logout-form">

                    @csrf

                    <button type="submit">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout

                    </button>

                </form>

            </div>

        </div>


        {{-- KONTEN UTAMA --}}

        <div class="main-content">

            @yield('content')

        </div>

    </div>


    {{-- =========================
         PAGE TRANSITION + TOAST SCRIPT
    ========================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =========================
               LINK TRANSITION
            ========================= */

            const links = document.querySelectorAll('a[href]');

            links.forEach(function (link) {

                const href = link.getAttribute('href');

                // Lewati link kosong (#) dan link yang buka tab baru
                if (!href || href === '#' || link.target === '_blank') {
                    return;
                }

                link.addEventListener('click', function (e) {

                    e.preventDefault();

                    document.body.classList.add('page-leaving');

                    setTimeout(function () {
                        window.location.href = href;
                    }, 200);

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


            /* =========================
               TOAST AUTO-HIDE
            ========================= */

            const toast = document.getElementById('toast-success');

            if (toast) {
                setTimeout(closeToast, 4000);
            }

        });

        function closeToast() {
            const toast = document.getElementById('toast-success');

            if (toast) {
                toast.classList.add('toast-hide');
                setTimeout(function () {
                    toast.remove();
                }, 300);
            }
        }

    </script>

</body>
</html>