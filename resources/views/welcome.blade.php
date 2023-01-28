<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>SIMSekolah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistem Informasi Sekolah SIMSEKOLAH" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/pages/landing.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body data-sidebar="dark">

        <div class="main-container w-100">
            <div class="wrapper">
                <h1 class="main-title">Welcome to <span class="title-gradient">SIMSekolah</span></h1>
                <div class="my-4 p-0">
                    <div class="row">
                    @foreach ($userType as $user)
                        <div class="col p-5 m-1 card-item">
                            <div class="d-flex flex-column align-items-center gap-3" onclick="navigateTo('{{ $user['type'] }}')">
                                <i class="{{ $user['icon'] }} mdi-lg"></i>
                                <p class="fs-3 account-type">{{ ucfirst($user['type']) }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <footer class="text-center">
                    © Hamdani
                </footer>
            </div>
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            function navigateTo (type) {
                location.href = `/${type}/login`
            }
        </script>
    </body>
</html>
