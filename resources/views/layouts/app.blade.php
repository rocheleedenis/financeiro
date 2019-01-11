<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/img/logo.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            background: #EBEBEB;
            color: #69696C;
        }
        nav {
            background: #BA90DE !important;
        }
        .btn-success { width: 60px; height: 60px; font-size: 20px; }
        .btn-mini { cursor: pointer; background: transparent; color: #8C8C8F; border: none; border-radius: 50%; width: 30px; height: 30px; }
        .btn-mini:hover { color: #69696C; background: #D1D4D9 }
    </style>
    @yield('styles')
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts/partials/nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- retirei o defer -->
    <script src="/vendor/fontawesome/fontawesome-all.min.js"></script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
