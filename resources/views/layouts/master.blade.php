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

    <style>
        .fix-top-margin-with-nav {
            padding-top: 70px !important;

        }

        /*footer isseus */
        body{
            height: 100% !important;
            margin:0;
            padding:0;
            padding-bottom:60px;// size of fotter
        }
        .footer{
            position:absolute;
            bottom:0;
            width:100%;
            height:60px;   /* Height of the footer */
            background:#6cf;
        }

    </style>
    @yield('style')
</head>
<body class="fix-top-margin-with-nav">

@include('partials._mainnav')
<!-- Page Content -->
<div class="container mt-5">
@yield('content','main Content Not found!')
@yield('script')
</div>

<!-- Footer -->
<footer class="py-5  bg-dark shadow-lg ">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;{{now()}} Your Website {{now()->format('Y')}}</p>
    </div>
    <!-- /.container -->
</footer>

<div  class=" bg-danger text-white-50 footer">
    <div class="container text-center">
        <small>Copyright &copy; Your Website</small>
    </div>
</div>



</body>
</html>
