<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name','Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lumen/bootstrap.min.css" rel="stylesheet">


    <style>
        .fix-top-margin-with-nav {
            padding-top: 70px !important;
        }


    </style>
    @yield('style')
</head>
<body class="fix-top-margin-with-nav min-vh-100 d-flex flex-column">

@include('partials._mainnav')
<!-- Page Content -->
<div class="container mt-5">
    @yield('content','main Content Not found!')
    @yield('script')
</div>


<footer class=" bg-danger text-white-50 d-flex justify-content-center mt-auto">
    <div class="container text-center ">
        <small>Shope &copy; {{now()->format('Y')}}</small>
    </div>
</footer>


</body>
</html>
