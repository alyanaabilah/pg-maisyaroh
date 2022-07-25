 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper">
     <div class="humberger__menu__logo">
         @if(Route::has('login'))
         @auth
         @if(Auth::user()->ceklevel === 'user')
         <a href="/user/home"><img src="{{ asset('front_assets/img/logo.jpg') }}" alt=""></a>
     </div>
     <div class="humberger__menu__cart">
         <ul>
             <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
             <li><a href="/user/cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
         </ul>
         <div class="header__cart__price">item: <span>$150.00</span></div>
     </div>
     <div class="humberger__menu__widget">
         <div class="header__top__right__language">
             <div>Hai {{Auth::user()->name}}</div>
             <span class="arrow_carrot-down"></span>
             <ul>
                 <li><a href="#">Profil Saya</a></li>
                 <li><a href="#">Order Saya</a></li>
             </ul>
         </div>
         <div class="header__top__right__auth">
             <a href="{{ route('logout') }}">Keluar</a>
         </div>
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="/user/home">Beranda</a></li>
             <li><a href="/user/shop">Belanja</a></li>
             <!-- <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li> !-->
             <li><a href="/user/service">Service</a></li>
             <li><a href="/user/contact">Kontak</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="humberger__menu__contact">
     </div>
     @else
     <a href="/admin/home"><img src="{{ asset('front_assets/img/logo.jpg') }}" alt=""></a>
 </div>
 <div class="humberger__menu__cart">
     <ul>
         <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
         <li><a href="/admin/cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
     </ul>
     <div class="header__cart__price">item: <span>$150.00</span></div>
 </div>
 <div class="humberger__menu__widget">
     <div class="header__top__right__language">
         <div>Hai {{Auth::user()->name}}</div>
         <span class="arrow_carrot-down"></span>
         <ul>
             <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
         </ul>
     </div>
     <div class="header__top__right__auth">
         <a href="{{ route('logout') }}">Keluar</a>
     </div>
 </div>
 <nav class="humberger__menu__nav mobile-menu">
     <ul>
         <li class="active"><a href="/admin/home">Beranda</a></li>
         <li><a href="/admin/shop">Belanja</a></li>
         <!-- <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li> !-->
         <li><a href="/admin/service">Service</a></li>
         <li><a href="/admin/contact">Kontak</a></li>
     </ul>
 </nav>
 <div id="mobile-menu-wrap"></div>
 <div class="humberger__menu__contact">
 </div>
 @endif
 @else

 <a href="/"><img src="{{ asset('front_assets/img/logo.jpg') }}" alt=""></a>
 </div>
 <div class="humberger__menu__cart">
 </div>
 <div class="humberger__menu__widget">
     <div class="header__top__right__language">
         <a href="{{route('register')}}">
             <div>Daftar</div>
         </a>
     </div>
     <div class="header__top__right__auth">
         <a href="{{ route('login') }}">Masuk</a>
     </div>
 </div>
 <nav class="humberger__menu__nav mobile-menu">
     <ul>
         <li class="active"><a href="/home">Beranda</a></li>
         <li><a href="/shop">Belanja</a></li>
         <!-- <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li> !-->
         <li><a href="/service">Service</a></li>
         <li><a href="/contact">Kontak</a></li>
     </ul>
 </nav>
 <div id="mobile-menu-wrap"></div>
 <div class="humberger__menu__contact">
 </div>

 @endif
 @endif
 </div>

 <!-- Humberger End -->