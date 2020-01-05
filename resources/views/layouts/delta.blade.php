<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/jquery-3.4.1.min.map') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.js.map') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome/css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/olcusa.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/bootstrap.css.map') }}"> --}}
    <style>
        .nav-link[data-toggle].collapsed:after {
    content: "▾";
}
.nav-link[data-toggle]:not(.collapsed):after {
    content: "▴";
}
    </style>

    @yield('style')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 collapse show d-md-flex bg-light pt-2 pl-0 min-vh-100" id="sidebar">
                <ul class="nav flex-column flex-nowrap overflow-hidden">
                    <li class="nav-item">
                        <a class="nav-link text-truncate" href="#"><i class="fa fa-home"></i> <span class="d-none d-sm-inline">Overview</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> <span class="d-none d-sm-inline">Reports</span></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item"><a class="nav-link py-0" href="#"><span>Orders</span></a></li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1"><span>Customers</span></a>
                                    <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                        <ul class="flex-column nav pl-4">
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-clock-o"></i> Daily </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-bar-chart"></i> Charts </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link p-1" href="#">
                                                    <i class="fa fa-fw fa-compass"></i> Areas </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-bar-chart"></i> <span class="d-none d-sm-inline">Analytics</span></a></li>
                    <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-download"></i> <span class="d-none d-sm-inline">Export</span></a></li>
                </ul>
            </div>
            <div class="col pt-2">
                <h2>
                    <a href="" data-target="#sidebar" data-toggle="collapse" class="d-md-none"><i class="fa fa-bars"></i></a> Content </h2>
                <h6 class="hidden-sm-down">Shrink page width to see sidebar collapse</h6>
                <p>Codeply editor wolf moon retro jean shorts chambray sustainable roof party. Shoreditch vegan artisan Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage. Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl lumbersexual bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache. 3 wolf moon hashtag church-key Odd Future. Austin messenger bag normcore, Helvetica Williamsburg sartorial tote bag distillery Portland before they sold out gastropub taxidermy Vice.</p>
            </div>
        </div>
    </div>
    {{-- @include('layouts.navbar') --}}
    {{-- <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End sidebar -->
            <main role="main" class="delta-w px-4">
                <div class="content">
                    @yield('content')
                </div>
            </main>
        </div>
    </div> --}}
    <script src="{{asset('/js/feather.min.js')}}"></script>
    @yield('javascript')
    @stack('javascript')
</body>

</html>
