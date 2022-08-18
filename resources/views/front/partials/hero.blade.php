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
                         @foreach ($brands as $produk)
                         <li><a href="/front-brand/{{ $produk->name }}">{{ $produk->name }}</a></li>
                         @endforeach
                     </ul>
                 </div>

             </div>
             <div class="col-lg-9">
                 <div class="hero__search">

                     <div class="hero__search">

                         <div class="hero__search__form">
                             <form action="{{route('search.products')}}" method="POST">
                                 @csrf
                                 <input type="text" placeholder="Apa yang anda cari?" name="search" id="search" value="" style="width: 520px">
                                 <button type="submit" class="site-btn">Cari</button>
                             </form>
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