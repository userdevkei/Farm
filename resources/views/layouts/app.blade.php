<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! Charts::styles() !!}
    <style>
        .h5
        {
            font-weight: bold;
            color: ;
        }
        .nav-link
        {
            color: white !important;
        }
        .navbar-brand:hover
        {
            font-weight: bold;
            margin-top: 7px;
            color: yellow !important;
        }
        .nav-link:hover
        {
            font-weight: bold;
            margin-top: 7px;
            color: yellow !important;
        }
        .dropdown-menu{
            background-color: rgb(11,102,35) !important;
            margin-top: 0;
        }
        .dropdown-item
        {
            color: white;
        }
        .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item:hover {
            margin-top: 7px;
            font-weight: bold;

        }
        .carousel-fade
        {
            margin-top: -24px !important;
        }
        .carousel-caption {
            right: 0;
            left: 75%;
            top: 0;
            bottom: 25%;
            text-align: center;
            padding: 10px;
            background-color: rgba(249, 207, 0,0.9);

        }
        .carousel-control-prev, .carousel-control-next{
            top: 75%;
        }
        .card-footer{
        background-color: rgba(173, 255, 47,0.3) ! important;
        }
        .card-body{
            background-color: ;
        }
        .navbar-brand
        {
            color: white !important;
        }
    </style>
</head>
<body style="background-color: rgba(173, 255, 47,0.3); min-height: 615px !important;">
    <div id="app">
        @include('template.navigation')
        <main class="py-4" style="min-height: 615px !important;">
            @include('template.alert')
            @yield('content')
        </main>
        @guest()
            @include('template.footer')
        @else
            @include('template.footer1')
        @endguest
    </div>
</body>
</html>
