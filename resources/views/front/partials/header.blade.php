<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->ceklevel === 'user')

                        <div class="header__top__right__language">

                            <div>Hai {{Auth::user()->name}} </div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="/user/my-profile">Profil Saya</a></li>
                                <li><a href="/user/my-orders">Order Saya</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('logout') }}">Keluar</a>
                        </div>
                        @elseif (Auth::user()->ceklevel === 'subsidi')
                        <div class="header__top__right__language">

                            <div>Hai {{Auth::user()->name}} (Subsidi) </div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="/subsidi/my-profile">Profil Saya</a></li>
                                <li><a href="/subsidi/my-orders">Order Saya</a></li>
                                <li><a href="/subsidi/coupon">Kupon</a></li>
                            </ul>
                        </div>

                        <div class="header__top__right__auth">
                            <a href="{{ route('logout') }}">Keluar</a>
                        </div>
                        @else
                        <div class="header__top__right__language">

                            <div>Hai {{Auth::user()->name}} </div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('logout') }}">Keluar</a>
                        </div>
                        @endif
                        @else
                        <div class="header__top__right__language">
                            <a href="{{route('register')}}">
                                <div>Daftar</div>
                            </a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i>Masuk</a>
                        </div>
                        @endif
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="#"><img src="{{ asset ('front_assets/img/logo.jpg') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    @if(Route::has('login'))
                    @auth
                    @if(Auth::user()->ceklevel === 'user')
                    <ul>
                        <li class="nav-link {{ ($active == 'home') ? 'active' : '' }}"><a href="/user/home">Beranda</a></li>
                        <li class="nav-link {{ ($active == 'shop') ? 'active' : '' }}"><a href="/user/shop">Belanja</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> !-->
                        <li class="nav-link {{($active == 'contact') ? 'active' : '' }}"><a href="/user/contact">Kontak</a></li>
                    </ul>
                    @elseif(Auth::user()->ceklevel === 'subsidi')
                    <ul>
                        <li class="nav-link {{ ($active == 'home') ? 'active' : '' }} "><a href="/user/home">Beranda</a></li>
                        <li class="nav-link {{ ($active == 'shop') ? 'active' : '' }}"><a href="/user/shop">Belanja</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> !-->
                        <li class="nav-link {{($active == 'contact') ? 'active' : '' }}"><a href="/user/contact">Kontak</a></li>
                    </ul>
                    @else
                    <ul>
                        <li class="{{ ($active == 'home') ? 'active' : '' }} "><a href="/admin/home">Beranda</a></li>
                        <li class="{{($active == 'shop') ? 'active' : '' }}"><a href="/admin/shop">Belanja</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> !-->
                        <li class="{{ ($active == 'contact') ? 'active' : '' }}"><a href="/admin/contact">Kontak</a></li>
                    </ul>

                    @endif
                    @else
                    <ul>
                        <li class="nav-link {{ ($active == 'home') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                        <li class="nav-link {{ ($active == 'shop') ? 'active' : '' }}"><a href="/shop">Belanja</a></li>
                        <!-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> !-->
                        <li class="nav-link {{ ($active == 'contact') ? 'active' : '' }}"><a href="/contact">Kontak</a></li>
                    </ul>

                    @endif
                    @endif
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @if(Route::has('login'))
                    @auth
                    @if(Auth::user()->ceklevel === 'user')
                    <ul>
                        <li><a href="/user/cart"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                    </ul>

                    @elseif(Auth::user()->ceklevel === 'subsidi')
                    <ul>
                        <li><a href="/subsidi/cart"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                    </ul>

                    @else
                    <ul>
                        <li><a href="/admin/cart"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                    </ul>

                    @endif

                    @endif
                    @endif

                </div>
            </div>

        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->