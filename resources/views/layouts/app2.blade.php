<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('header-layout')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/jquery-3.4.1.min.map') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.js.map') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/bootstrap.css.map') }}"> --}}

    @yield('style')
</head>
<body class="@yield('bodyClass')">
    @yield('content')
    @yield('javascript')
    @stack('javascript')
</body>
</html>
