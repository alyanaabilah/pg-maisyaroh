<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link href="{{ asset ('front_assets/img/favicon.png') }}" rel="shortcut icon" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/elegant-icons.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('front_assets/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/custom.css') }}">
</head>


<body>


    @include('front.partials.preloader')
    @include('front.partials.hamburger')

    @include('front.partials.header')



    @yield('content')


    @include('front.partials.footer')





















    <!-- Js Plugins -->
    <script src="{{ asset('front_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('front_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front_assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    <script src="{{ asset('front_assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>






</body>

</html>