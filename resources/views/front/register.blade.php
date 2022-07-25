<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{$title}}</title>
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
        <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{ asset ('admin/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

        <!-- SLEEK CSS -->
        <link id="sleek-css" rel="stylesheet" href="{{ asset ('admin/assets/css/sleek.css') }}" />



        <!-- FAVICON -->
        <link href="{{ asset ('admin/assets/img/favicont.png') }}" rel="shortcut icon" />

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="{{ asset ('admin/assets/plugins/nprogress/nprogress.js') }}"></script>
    </head>

</head>

<body class="bg-light-gray" id="body">
    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h2 class="text-light" style="text-align: center;">Pangkalan Gas Maisyaroh</h2>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5">Daftar</h4>
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="name" class="form-control input-lg rounded-top @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeholder="Nama" autofocus value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="username" class="form-control input-lg rounded-top @error('username') is-invalid @enderror" id="username" aria-describedby="usernameHelp" placeholder="Username" autofocus value="{{old('username')}}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" name="email" class="form-control input-lg rounded-top @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input type="password" name="password" class="form-control input-lg rounded-top @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{old('password')}}">
                                    @error('password')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-lg btn-success btn-block mb-4">Daftar</button>
                                    <p>Sudah punya akun?
                                        <a class="text-green" href="{{ route('login') }}">Masuk</a>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="copyright pl-0">
            <p class="text-center">&copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
                <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                Application By Alya Nabilah
            </p>
        </div>
    </div>




    <script src="{{ asset ('admin/https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM') }}" defer></script>
    <script src="{{ asset ('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/sleek.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/chart.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/date-range.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/map.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/custom.js') }}"></script>
</body>

</html>