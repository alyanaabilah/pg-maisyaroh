@extends('layouts.user')

@section('content')



<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Brands</span>
                    </div>
                    <ul>
                        @foreach ($brands as $brand)
                        <li><a href="/front-brand/{{ $brand->name }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('search.products')}}" method="POST">
                            @csrf
                            <input type="text" placeholder="Apa yang anda cari?" name="search" id="search" value="" style="width: 520px">
                            <button type="submit" class="site-btn">Cari</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@include('front.partials.breadcrumb')

<!-- Product Details Section Begin -->
<section class="product-details spad ">
    <div class="container product_data">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{asset('storage/'. $product->image)}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->name }}</h3>
                    <div class="product__details__price">@currency($product->sell_price)</div>
                    <h5>{!!$product->desciption !!}</h5>
                    <div class="product__details__quantity">
                        <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="input-group text-center mb-3" style="width:130px">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" value="1" class="form-control text-center qty-input" name="quantity">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    @if($product->stock > 0)
                    <button type="button" class="primary-btn addToCartBtn border-0">TAMBAH KE KERANJANG</button>
                    @endif


                    <ul>
                        @if($product->stock > 0)
                        <li><b>Status</b> <span>Ada</span></li>
                        @else
                        <li><b>Status</b> <span>Habis</span></li>
                        @endif
                        <li><b>Tersisa</b> <span>{{ $product->stock }}</span></li>

                    </ul>
                </div>
            </div>

           

        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->

<!-- Related Product Section End -->


@endsection