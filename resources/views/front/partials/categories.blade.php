 <!-- Categories Section Begin -->

 <section class="categories">
     <div class="container">
         <div class="row">
             <div class="categories__slider owl-carousel">
                 @foreach ($product as $produk)
                 <div class="col-lg-3">
                     <div class="categories__item set-bg" data-setbg="{{asset('storage/'. $produk->category->image)}}">
                         <h5><a href="/front-category/{{ $produk->category->slug }}">{{ $produk->category->name }}</a></h5>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>

 <!-- Categories Section End -->