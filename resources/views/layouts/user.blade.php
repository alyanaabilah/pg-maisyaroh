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


    
    @include('front.partials.hamburger')

    @include('front.partials.header')



    @yield('content')



    <div class="whatsapp-chat">
        <a href="https://wa.me/6287838797675?text=Saya%20ingin%20bertanya%20tentang%20barang%20yang%20dijual" target="_blank">
            <img src="{{asset('front_assets/img/whatsapp.png')}}" alt="whatsapp-chat" height="80px" width="80px">
        </a>
    </div>

    @include('front.partials.footer')





















    <!-- Js Plugins -->
    <script src="{{ asset('front_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front_assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    <script src="{{ asset('front_assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/62eae20437898912e961180e/1g9io5pl6';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    @if(session('status'))
    <script>
        Swal.fire("{{session('status')}}");
    </script>
    @endif
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search").autocomplete({
                source: availableTags
            });

        };
    </script>


</body>

</html>