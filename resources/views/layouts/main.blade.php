<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/fontawesome/css/all.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jQuery.js') }}"></script>

</head>
<body>
<div id="app">
    <div class="container d-flex align-items-center pt-3">
        <img src="{{ asset('/assets/image/logo.png') }}" style="width: 80px" alt="">
        <h6 style="text-transform: uppercase; width: 300px; margin-bottom: 0; padding-left: 1rem">O'zbekiston Respublikasi Davlat Aktivlarini Boshqarish Agentligiga Murojaat</h6>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Bosh sahifa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ommaviy oferta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container">
        @yield('content')
    </main>
    <div class="bg-primary text-white">
        <div class="container py-3">
            <span>
                &copy; {{ \Carbon\Carbon::now()->year }} O'zbekiston Respublikasi Davlat agentliklarini Boshqarish Agentligi
            </span>
            <span class="float-end">
                <i class="fa-solid fa-globe pe-1"></i>
                www.davaktiv.uz
            </span>
        </div>
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</div>
</body>
</html>
