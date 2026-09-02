<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tes Minat Bakat')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>

        /* =========================
           GLOBAL
        ========================= */

        body {

            background-color: #f4f6f9;

            font-family: 'Segoe UI', sans-serif;

        }


        .navbar-brand {

            font-weight: 700;

        }


        .card {

            border: none;

            border-radius: 12px;

            box-shadow: 0 2px 10px rgba(0,0,0,0.06);

        }


        /* =========================
           PAGE TRANSITION
        ========================= */

        body {

            animation: pageFadeIn 0.35s ease-in-out;

        }


        /* =========================
           FADE IN
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
           FADE OUT
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

    </style>

</head>


<body>


    {{-- =========================
         NAVBAR
    ========================= --}}

    <nav class="navbar navbar-expand-lg navbar-dark"
         style="background-color: #2c3e50;">

        <div class="container">

            <a class="navbar-brand"
               href="#">

                <i class="fa-solid fa-graduation-cap"></i>

                Tes Minat Bakat

            </a>


            <div class="d-flex align-items-center">

                <span class="text-light me-3">
                    {{ auth()->user()->name }}
                </span>


                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="btn btn-outline-light btn-sm">

                        <i class="fa-solid fa-right-from-bracket"></i>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>



    {{-- =========================
         CONTENT
    ========================= --}}

    <div class="container mt-5">

        @yield('content')

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


                    /*
                     * Abaikan link:
                     * - kosong
                     * - #
                     * - anchor
                     * - target blank
                     * - download
                     */

                    if (
                        !href ||
                        href === '#' ||
                        href.startsWith('#') ||
                        this.target === '_blank' ||
                        this.hasAttribute('download')
                    ) {

                        return;

                    }


                    /*
                     * Abaikan Ctrl / Cmd / Shift /
                     * Alt / klik tombol tengah
                     */

                    if (
                        e.ctrlKey ||
                        e.metaKey ||
                        e.shiftKey ||
                        e.altKey ||
                        e.button !== 0
                    ) {

                        return;

                    }


                    /*
                     * Hentikan perpindahan
                     * sementara
                     */

                    e.preventDefault();


                    /*
                     * Jalankan fade-out
                     */

                    document.body.classList.add('page-leaving');


                    /*
                     * Pindah halaman setelah
                     * animasi selesai
                     */

                    setTimeout(function () {

                        window.location.href = href;

                    }, 200);

                });

            });

        });

    </script>


</body>

</html>