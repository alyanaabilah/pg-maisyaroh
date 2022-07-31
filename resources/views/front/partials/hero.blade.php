 <!-- Hero Section Begin -->
 <section class="hero ">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">

                 <div class="hero__categories">
                     <div class="hero__categories__all">
                         <i class="fa fa-bars"></i>
                         <span>Brands</span>
                     </div>
                     <ul>
                         @foreach ($product as $produk)
                         <li><a href="/front-brand/{{ $produk->brand->name }}">{{ $produk->brand->name }}</a></li>
                         @endforeach
                     </ul>
                 </div>

             </div>
             <div class="col-lg-9">
                 <div class="hero__search">
                     <div class="hero__search__form">
                         <form action="#">
                             <div class="hero__search__categories">
                                 All Categories
                                 <span class="arrow_carrot-down"></span>
                             </div>
                             <input type="text" placeholder="What do yo u need?">
                             <button type="submit" class="site-btn">SEARCH</button>
                         </form>
                     </div>
                     <div class="hero__search__phone">
                         <div class="hero__search__phone__icon">
                             <i class="fa fa-phone"></i>
                         </div>
                         <div class="hero__search__phone__text">
                             <h5>+65 11.188.888</h5>
                             <span>support 24/7 time</span>
                         </div>
                     </div>
                 </div>
                 <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">

                     <ol class="carousel-indicators">
                         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                     </ol>

                     <div class="carousel-inner">
                         <div class="carousel-item active card border-0 ml-3">
                             <div class="card border-0">
                                 <div class="card-body">
                                     <div class="card-img-overlay">
                                         <br>
                                         <br>
                                         <br>
                                         <h2 style="font-size: 3vw;">Selamat datang <br>Pangkalan Gas Maisyaroh</h2>
                                         <br>
                                         <br>
                                         <button type="button" class="btn btn-primary mt-3">Primary</button>
                                     </div>
                                     <img src="{{ asset ('front_assets/img/hero-2.png') }}" class="d-block w-100" alt="...">
                                 </div>
                             </div>
                         </div>
                         <div class="carousel-item card border-0">
                             <div class="card border-0">
                                 <div class="card-body border-0">
                                     <div class="card-img-overlay">
                                         <br>
                                         <br>
                                         <br>
                                         <h2 style="font-size: 3vw;">Selamat datang <br>Pangkalan Gas Maisyaroh</h2>
                                         <br>
                                         <br>
                                         <button type="button" class="btn btn-primary mt-3">Primary</button>
                                     </div>
                                     <img src="{{ asset ('front_assets/img/hero-1.png') }}" class="d-block w-100" alt="...">
                                 </div>
                             </div>
                         </div>
                         <div class="carousel-item card border-0">
                             <div class="card border-0">
                                 <div class="card-body border-0">
                                     <div class="card-img-overlay">
                                         <br>
                                         <br>
                                         <br>
                                         <h2 style="font-size: 3vw;">Selamat datang <br>Pangkalan Gas Maisyaroh</h2>
                                         <br>
                                         <br>
                                         <button type="button" class="btn btn-primary mt-3">Primary</button>
                                     </div>
                                     <img src="./path/to/3.png" class="d-block w-100" alt="...">
                                 </div>
                             </div>
                         </div>
                         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="sr-only">Previous</span>
                         </a>
                         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="sr-only">Next</span>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero Section End -->