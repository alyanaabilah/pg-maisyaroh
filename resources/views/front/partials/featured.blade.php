 <!-- Featured Section Begin -->
 <section class="featured spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <h2>New Product</h2>
                 </div>
                 <div class="featured__controls">
                 </div>
             </div>
         </div>
         <div class="row featured__filter">
             @foreach($product as $produk)
             @if(Route::has('login'))
             @auth
             @if(Auth::user()->ceklevel === 'user')
             <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                         <ul class="featured__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="/user/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                         <h5>@currency($produk->sell_price)</h5>
                     </div>
                 </div>
             </div>
             @elseif(Auth::user()->ceklevel === 'subsidi')
             <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                         <ul class="featured__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="/user/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                         <h5>@currency($produk->sell_price)</h5>
                     </div>
                 </div>
             </div>
             @else
             <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                         <ul class="featured__item__pic__hover">
                             <li><a href="#"><i class="fa fa-heart"></i></a></li>
                             <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="/admin/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                         <h5>@currency($produk->sell_price)</h5>
                     </div>
                 </div>
             </div>
             @endif
             @else
             <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                 <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                         <ul class="featured__item__pic__hover">
                         </ul>
                     </div>
                     <div class="featured__item__text">
                         <h6><a href="/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                         <h5>@currency($produk->sell_price)</h5>
                     </div>
                 </div>
             </div>
             @endif
             @endif
             @endforeach
         </div>
     </div>
 </section>
 <!-- Featured Section End -->