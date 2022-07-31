<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ $title }}</title>
</head>

<body>

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
    <link rel="stylesheet" href="{{ asset ('admin/assets/css/custom.css') }}" />

    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>

    <!-- FAVICON -->
    <link href="{{ asset ('admin/assets/img/favicon.png') }}" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ ('admin/assets/plugins/nprogress/nprogress.js') }}"></script>



    </head>


    <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
        <script>
            NProgress.configure({
                showSpinner: false
            });
            NProgress.start();
        </script>

        <div class="mobile-sticky-body-overlay"></div>

        <div class="wrapper">

            <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
            <aside class="left-sidebar bg-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">
                    <!-- Aplication Brand -->
                    <div class="app-brand">
                        <a href="/index.html">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Admin Dashboard</span>
                        </a>
                    </div>
                    <!-- begin sidebar scrollbar -->
                    <div class="sidebar-scrollbar">

                        <!-- sidebar menu -->
                        <ul class="nav sidebar-inner" id="sidebar-menu">



                            <li class="has-sub active expand">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="nav-text">Dashboard</span> <b class="caret"></b>
                                </a>

                            </li>

                            <!-- Attribut !-->

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages">
                                    <i class="mdi mdi-image-filter-none"></i>
                                    <span class="nav-text">Attribut</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="pages" data-parent="#sidebar-menu">
                                    <div class="sub-menu">
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/brand">
                                                <span class="nav-text">Brand</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href=" /admin/category  ">
                                                <span class="nav-text">Kategori</span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>

                            <!-- Data Master !-->

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts">
                                    <i class="mdi mdi-chart-pie"></i>
                                    <span class="nav-text">Data Master</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                                    <div class="sub-menu">
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/user">
                                                <span class="nav-text">User</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/product">
                                                <span class="nav-text">Product</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/incoming-product">
                                                <span class="nav-text">Barang Masuk</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="sidenav-item-link" href="/admin/coupon">
                                                <span class="nav-text">Kupon</span>
                                            </a>
                                        </li>

                                    </div>
                                </ul>
                            </li>

                            <!-- Data Transaksi !-->

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements" aria-expanded="false" aria-controls="ui-elements">
                                    <i class="mdi mdi-folder-multiple-outline"></i>
                                    <span class="nav-text">Data Transaksi</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="ui-elements" data-parent="#sidebar-menu">
                                    <div class="sub-menu">


                                        <li>
                                            <a class="sidenav-item-link" href="/admin/order-item">
                                                <span class="nav-text">Barang Terjual</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/orders">
                                                <span class="nav-text">Penjualan Barang</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Status Retur Pelanggan</span><!-- tabel retur brg pelanggan+field(tgl barang dikirim ke pelanggan(kalau tdk diisi maka status tdk keluar),status) !-->
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Barang Request</span> <!-- join antara tabel produk+brand+field(qty, harga satuan, harga total per barang, harga jumlah pemesanan) !-->
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>

                            <!-- Laporan !-->
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation" aria-expanded="false" aria-controls="documentation">
                                    <i class="mdi mdi-book-open-page-variant"></i>
                                    <span class="nav-text">Laporan</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="documentation" data-parent="#sidebar-menu">
                                    <div class="sub-menu">
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Request Barang Sales</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Stok Produk</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Penjualan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Barang Terlaris</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Wilayah Terbanyak</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Retur Sales</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="user-profile.html">
                                                <span class="nav-text">Pelanggan Terloyal</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="sidenav-item-link" href="/admin/subsidi">
                                                <span class="nav-text">Pelanggan Subsidi</span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                            <a href="/admin/home" class="mb-2 btn btn-sm btn-success border-0">HOME</a>
                        </ul>
                    </div>
                    <hr class="separator" />
                    <div class="sidebar-footer">

                    </div>
                </div>
            </aside>



            <div class="page-wrapper">
                <!-- Header -->
                <header class="main-header " id="header">
                    <nav class="navbar navbar-static-top navbar-expand-lg">
                        <!-- Sidebar toggle button -->
                        <button id="sidebar-toggler" class="sidebar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <!-- search form -->
                        <div class="search-form d-none d-lg-inline-block">
                            <div class="input-group">
                                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
                            </div>
                            <div id="search-results-container">
                                <ul id="search-results"></ul>
                            </div>
                        </div>

                        <div class="navbar-right ">
                            <ul class="nav navbar-nav">


                                <!-- User Account -->
                                <li class="dropdown user-menu">
                                    @if(Route::has('login'))
                                    @if(Auth::user()->ceklevel === 'admin')
                                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                                        <span class="d-none d-lg-inline-block">Hai {{Auth::user()->name}}</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <!-- User image -->
                                        <li>
                                            <a href="profile.html">
                                                <i class="mdi mdi-account"></i> My Profile
                                            </a>
                                        </li>
                                        <li class="dropdown-footer">
                                            <a href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
                                        </li>
                                    </ul>
                                    @endif
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </nav>


                </header>


                <div class="content-wrapper">
                    @yield ('content')











                </div>

                <footer class="footer mt-auto">
                    <div class="copyright bg-white">
                        <p>
                            &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                            <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                        </p>
                    </div>
                    <script>
                        var d = new Date();
                        var year = d.getFullYear();
                        document.getElementById("copy-year").innerHTML = year;
                    </script>
                </footer>

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
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

    </body>

</html>