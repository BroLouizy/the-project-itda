
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Siswa')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

/* ==================================================
   SIMPRODI AEROSPACE EXECUTIVE
   Theme: Aerospace Navy, Aviation Blue, Champagne Gold
   ================================================== */

   :root {
    --aero-navy: #102a4c;
    --aero-navy-deep: #0b1e36;
    --aero-blue: #246bce;
    --aero-blue-light: #eaf2ff;
    --aero-gold: #d6b46a;
    --aero-gold-light: #f7f0df;
    --aero-bg: #f2f5f9;
    --aero-white: #ffffff;
    --aero-text: #1b2a3d;
    --aero-muted: #748196;
    --aero-border: #e3e9f1;
    --aero-shadow: 0 8px 28px rgba(16, 42, 76, .055);
}

/* BASE */

html,
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    background: var(--aero-bg);
    color: var(--aero-text);
    font-family: "Segoe UI", Arial, sans-serif;
    overflow: hidden;
}

a {
    transition: color .2s ease, background .2s ease;
}

/* HEADER PREMIUM - AEROSPACE NAVY */

.top-header {
    position: fixed !important;
    inset: 0 0 auto 0;
    z-index: 1100;

    height: 88px;
    padding: 12px 28px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    /* Navy khas Aerospace */
    background: #102a4c !important;

    /* Pemisah header dan konten */
    border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;

    /* Bayangan lembut */
    box-shadow: 0 5px 18px rgba(11, 30, 54, 0.18) !important;
}

/* Aksen emas di bawah header */
.top-header::after {
    content: "";
    position: absolute;
    bottom: -1px;
    left: 28px;

    width: 64px;
    height: 3px;

    background: #d6b46a;
    border-radius: 2px 2px 0 0;
}

/* Nama siswa */
.top-header h5 {
    color: #ffffff !important;
}

/* Informasi sekolah */
.top-header small {
    color: #c5d2e3 !important;
}

/* Logo SIMPRODI */
.brand-mini-text {
    color: #ffffff !important;
}

.brand-mini-text::after {
    background: #d6b46a !important;
}

/* Foto profil tetap bulat */
.avatar-circle {
    border: 2px solid #d6b46a !important;
    background: #ffffff !important;
    box-shadow: none !important;
}

/* Aksen header pada layar HP */
@media (max-width: 768px) {
    .top-header::after {
        left: 12px;
        width: 42px;
    }
}

.header-left {
    display: flex;
    align-items: center;
    min-width: 0;
    gap: 0;
}


/* FOTO PROFIL BULAT SEMPURNA */
.avatar-circle {
    width: 52px !important;
    height: 52px !important;
    min-width: 52px !important;
    min-height: 52px !important;

    display: flex !important;
    align-items: center !important;
    justify-content: center !important;

    overflow: hidden !important;
    box-sizing: border-box !important;

    border: 2px solid #d6b46a !important;
    border-radius: 50% !important;

    background: #ffffff !important;
    box-shadow: none !important;
    padding: 0 !important;
}

/* GAMBAR DI DALAM AVATAR */
.avatar-circle img {
    display: block !important;

    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;

    object-fit: cover !important;
    object-position: center !important;

    border: none !important;
    border-radius: 50% !important;
    box-shadow: none !important;
    padding: 0 !important;
    margin: 0 !important;
    background: transparent !important;
}

/* UKURAN AVATAR DI HP */
@media (max-width: 768px) {
    .avatar-circle {
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        min-height: 40px !important;
    }
}


.top-header h5 {
    color: var(--aero-navy);
    font-size: 16px;
    font-weight: 750;
    letter-spacing: -.25px;
}

.top-header small {
    display: inline-block;
    margin-top: 4px;
    color: var(--aero-muted);
    font-size: 12px;
}

.brand-mini-text {
    color: var(--aero-navy);
    font-size: 23px;
    font-weight: 850;
    letter-spacing: 2px;
}

.brand-mini-text::after {
    content: "";
    display: block;
    width: 34px;
    height: 3px;
    margin: 5px auto 0;
    border-radius: 5px;
    background: var(--aero-gold);
}

/* LAYOUT DAN SCROLL TERPISAH */

.layout-wrapper {
    position: fixed;
    top: 88px;
    right: 0;
    bottom: 0;
    left: 0;

    display: flex;
    flex-direction: row;
    align-items: stretch;

    width: 100%;
    height: calc(100vh - 88px);
    min-height: 0;

    overflow: hidden;
}

.sidebar {
    position: relative;
    z-index: 100;

    flex: 0 0 230px;
    width: 230px;
    min-width: 230px;
    max-width: 230px;
    height: 100%;

    overflow: hidden;

    background: linear-gradient(
        180deg,
        var(--aero-navy) 0%,
        var(--aero-navy-deep) 100%
    );

    border-right: 1px solid rgba(255, 255, 255, .06);
}

.sidebar-flex {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 0;
    padding: 17px 12px 12px;
}

.sidebar a {
    position: relative;

    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 5px;
    padding: 14px 15px;

    color: #c5d2e3;
    background: transparent;
    border: 0;
    border-radius: 10px;

    font-size: 13.5px;
    font-weight: 500;
    text-decoration: none;

    transition: background .2s ease, color .2s ease;
}

.sidebar a i {
    width: 19px;
    min-width: 19px;
    color: #9eb2cd;
    text-align: center;
    font-size: 15px;
}

.sidebar a:hover {
    color: #fff;
    background: rgba(255, 255, 255, .08);
}

.sidebar a:hover i {
    color: var(--aero-gold);
}

.sidebar a.active {
    color: #fff;
    background: linear-gradient(
        100deg,
        rgba(36, 107, 206, .42),
        rgba(36, 107, 206, .15)
    );
    border: 1px solid rgba(214, 180, 106, .22);
    font-weight: 700;
}

.sidebar a.active::before {
    content: "";
    position: absolute;
    top: 9px;
    bottom: 9px;
    left: -12px;

    width: 3px;
    border-radius: 0 4px 4px 0;
    background: var(--aero-gold);
}

.sidebar a.active i {
    color: var(--aero-gold);
}

.sidebar .logout-link {
    margin-top: auto;
    flex-shrink: 0;
    overflow: hidden;

    border-top: 1px solid rgba(255, 255, 255, .12);
}

.sidebar .logout-link button {
    display: flex;
    align-items: center;
    gap: 12px;

    width: 100%;
    padding: 14px 15px;

    color: #ffb8b8;
    background: transparent;
    border: 0;
    border-radius: 10px;

    font-size: 13.5px;
    text-align: left;
}

.sidebar .logout-link button i {
    width: 19px;
    color: #ff9292;
}

.sidebar .logout-link button:hover {
    color: #fff;
    background: rgba(220, 53, 69, .13);
}

/* AREA KONTEN */

.main-content {
    flex: 1 1 0;
    width: auto;
    min-width: 0;
    min-height: 0;
    height: 100%;

    padding: 30px;
    overflow-x: hidden;
    overflow-y: auto;

    background:
        radial-gradient(
            ellipse at 95% 0%,
            rgba(36, 107, 206, .045),
            transparent 38%
        ),
        var(--aero-bg);

    overscroll-behavior-y: contain;
    scrollbar-gutter: stable;
    -webkit-overflow-scrolling: touch;
}

/* TIPOGRAFI */

.main-content h1,
.main-content h2,
.main-content h3,
.main-content h4,
.main-content h5 {
    color: var(--aero-navy);
    letter-spacing: -.35px;
}

.main-content h1,
.main-content h2 {
    font-weight: 800;
}

.main-content p {
    line-height: 1.7;
}

.text-muted {
    color: var(--aero-muted) !important;
}

.text-primary {
    color: var(--aero-blue) !important;
}

/* KARTU PREMIUM */

.main-content .card {
    position: relative;
    background: var(--aero-white);
    border: 1px solid rgba(227, 233, 241, .85) !important;
    border-radius: 18px !important;
    box-shadow: var(--aero-shadow) !important;

    transition:
        transform .22s ease,
        box-shadow .22s ease,
        border-color .22s ease;
}

.main-content .card:hover {
    border-color: rgba(214, 180, 106, .55) !important;
    box-shadow: 0 13px 32px rgba(16, 42, 76, .09) !important;
}

.main-content .card h4,
.main-content .card h5 {
    font-weight: 750;
}

.main-content .card-body {
    min-width: 0;
}

/* TOMBOL */

.main-content .btn {
    border-radius: 10px;
    padding: 10px 18px;
    font-size: 13.5px;
    font-weight: 650;
    transition: transform .2s ease, box-shadow .2s ease;
}

.main-content .btn:hover {
    transform: translateY(-1px);
}

.main-content .btn-primary,
.btn-primary {
    color: #fff !important;
    background: linear-gradient(
        135deg,
        var(--aero-navy),
        var(--aero-blue)
    ) !important;
    border: 1px solid var(--aero-navy) !important;
    box-shadow: 0 5px 14px rgba(36, 107, 206, .15);
}

.main-content .btn-primary:hover,
.btn-primary:hover {
    background: var(--aero-navy) !important;
    box-shadow: 0 7px 18px rgba(16, 42, 76, .2);
}

.main-content .btn-outline-primary,
.btn-outline-primary {
    color: var(--aero-navy) !important;
    background: #fff !important;
    border: 1px solid #cbd6e5 !important;
}

.main-content .btn-outline-primary:hover,
.btn-outline-primary:hover {
    color: var(--aero-navy) !important;
    background: var(--aero-blue-light) !important;
}

/* PROGRESS BAR */

.main-content .progress {
    height: 11px !important;
    overflow: hidden;
    background: #e7edf5;
    border-radius: 20px !important;
}

.main-content .progress-bar {
    background: linear-gradient(
        90deg,
        var(--aero-blue),
        #5b9bfa
    ) !important;
}

/* BADGE DAN IKON */

.main-content .badge {
    font-weight: 650;
    letter-spacing: .2px;
}

.main-content .bg-primary.bg-opacity-10 {
    background: var(--aero-blue-light) !important;
}

.main-content .bg-warning.bg-opacity-10 {
    background: var(--aero-gold-light) !important;
}

.main-content .text-warning {
    color: #b28b35 !important;
}

/* FORM DAN TABEL */

.main-content .form-control,
.main-content .form-select {
    min-height: 43px;
    border: 1px solid #dce4ef;
    border-radius: 10px;
    box-shadow: none;
}

.main-content .form-control:focus,
.main-content .form-select:focus {
    border-color: var(--aero-blue);
    box-shadow: 0 0 0 3px rgba(36, 107, 206, .1);
}

.main-content .table {
    --bs-table-bg: transparent;
    vertical-align: middle;
}

.main-content .table thead th {
    color: var(--aero-navy);
    background: #f1f5fa;
    border-bottom-color: var(--aero-border);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .45px;
}

.main-content .table td {
    border-color: var(--aero-border);
}

/* RESPONSIVE */

@media (max-width: 768px) {
    .top-header {
        height: 76px;
        padding: 9px 12px;
        gap: 8px;
    }

    .avatar-circle {
        width: 38px;
        height: 38px;
        min-width: 38px;
        margin-right: 8px;
    }

    .top-header h5 {
        max-width: 175px;
        font-size: 12px;
        line-height: 1.4;
    }

    .top-header small {
        max-width: 175px;
        font-size: 10px;
        line-height: 1.3;
    }

    .brand-mini-text {
        position: static;
        transform: none;
        flex-shrink: 0;
        font-size: 14px;
        letter-spacing: .7px;
    }

    .brand-mini-text::after {
        width: 22px;
        height: 2px;
        margin-top: 3px;
    }

    .layout-wrapper {
        top: 76px;
        height: calc(100vh - 76px);
        min-height: 0;
        overflow: hidden;
    }

    .sidebar {
        flex: 0 0 62px;
        width: 62px;
        min-width: 62px;
        max-width: 62px;
    }

    .sidebar-flex {
        padding: 12px 6px 8px;
    }

    .sidebar a {
        justify-content: center;
        gap: 0;
        padding: 15px 4px;
        font-size: 0;
    }

    .sidebar a i {
        width: 22px;
        min-width: 22px;
        font-size: 16px;
    }

    .sidebar a.active::before {
        left: -6px;
    }

    .sidebar .logout-link button {
        justify-content: center;
        gap: 0;
        padding: 15px 4px;
        font-size: 0;
    }

    .sidebar .logout-link button i {
        width: 22px;
        font-size: 16px;
    }

    .main-content {
        padding: 18px 12px;
    }

    .main-content .card-body {
        padding: 18px !important;
    }

    .main-content h1 {
        font-size: 1.65rem;
        line-height: 1.3;
        overflow-wrap: anywhere;
    }

    .main-content h2 {
        font-size: 1.4rem;
        overflow-wrap: anywhere;
    }

    .main-content h3 {
        font-size: 1.2rem;
        line-height: 1.4;
    }

    .main-content .row {
        --bs-gutter-x: 12px;
        --bs-gutter-y: 14px;
    }

    .main-content .table-responsive {
        overflow-x: auto;
    }
}

@media (max-width: 400px) {
    .top-header {
        padding: 8px;
    }

    .avatar-circle {
        width: 34px;
        height: 34px;
        min-width: 34px;
        margin-right: 6px;
    }

    .top-header h5 {
        max-width: 145px;
        font-size: 11px;
    }

    .top-header small {
        max-width: 145px;
        font-size: 9px;
    }

    .brand-mini-text {
        font-size: 12px;
    }

    .sidebar {
        flex-basis: 54px;
        width: 54px;
        min-width: 54px;
        max-width: 54px;
    }

    .main-content {
        padding: 14px 9px;
    }

    .main-content .card-body {
        padding: 14px !important;
    }
}


            /* =========================================
            HP DENGAN LAYAR SEMPIT
            ========================================= */

            @media (max-width: 400px) {

            .top-header {
                padding: 8px;
            }

            .avatar-circle {
                width: 34px;
                height: 34px;
                min-width: 34px;
                margin-right: 6px;
            }

            .top-header h5 {
                font-size: 11px;
                max-width: 155px;
            }

            .top-header small {
                font-size: 9px;
            }

            .brand-mini-text {
                font-size: 13px;
            }

            .sidebar {
                flex-basis: 56px;
                width: 56px;
                min-width: 56px;
                max-width: 56px;
            }

            .main-content {
                padding: 12px 10px;
            }

            .main-content .card-body {
                padding: 14px !important;
            }
            }

            
        /* Layout desktop */
        .layout-wrapper {
            position: fixed;
            top: 88px;
            left: 0;
            right: 0;
            height: calc(100vh - 88px);
            min-height: 0;
            overflow: hidden;
        }

        /* Layout HP */
        @media (max-width: 768px) {
            .layout-wrapper {
                top: 76px;
                height: calc(100vh - 76px);
                min-height: 0;
                overflow: hidden;
            }
        }

    </style>
</head>

<body>

    {{-- HEADER --}}

    <header class="top-header">

        <div class="header-left">

            <div class="avatar-circle" id="headerAvatar">
                <img
                    id="headerAvatarImg"
                    src="{{ auth()->user()->profile_photo
                        ? asset('storage/' . auth()->user()->profile_photo)
                        : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=2c5cf5&color=fff' }}"
                    alt="Foto Profil"
                    style="width:100%;height:100%;border-radius:50%;object-fit:cover;"
                >
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

    </header>

    {{-- SIDEBAR DAN KONTEN --}}

    <div class="layout-wrapper">

        {{-- SIDEBAR TETAP --}}

        <aside class="sidebar">

            <div class="sidebar-flex">

                {{-- HOME --}}

                <a
                    href="{{ route('student.dashboard') }}"
                    class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-house"></i>
                    <span>Beranda</span>
                </a>

                {{-- TES --}}

                <a
                    href="{{ Route::has('tes.mulai') ? route('tes.mulai') : '#' }}"
                    class="{{ request()->routeIs('tes.*') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Mulai Tes</span>
                </a>

                {{-- HASIL --}}

                <a
                    href="{{ Route::has('hasil.tes') ? route('hasil.tes') : '#' }}"
                    class="{{ request()->routeIs('hasil.*') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Hasil Tes</span>
                </a>

                {{-- PROFILE --}}

                <a
                    href="{{ route('student.setting') }}"
                    class="{{ request()->routeIs('student.setting') ? 'active' : '' }}"
                >
                    <i class="fa-solid fa-gear"></i>
                    <span>Profil Saya</span>
                </a>

                {{-- LOGOUT --}}

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="logout-link"
                >
                    @csrf

                    <button type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar</span>
                    </button>
                </form>

            </div>

        </aside>

        {{-- KONTEN YANG DAPAT DI-SCROLL --}}

        <main class="main-content" id="mainContent">

            @yield('content')

        </main>

    </div>

</body>
</html>
