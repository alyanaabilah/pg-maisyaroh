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
                        <span>Brand</span>
                    </div>
                    <ul>
                        @foreach ($product as $produk)
                         <li><a href="/front-brand/{{ $produk->brand->name }}">{{ $produk->brand->name }}</a></li>
                         @endforeach
                    </ul>
                </div>
            </div>
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
</section>
<!-- Hero Section End -->


<!-- Breadcrumb Section Begin -->

@include('front.partials.breadcrumb')
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Kategori</h4>
                        <ul>
                            @foreach ($product as $produk)
                            <li><a href="/front-category/{{ $produk->category->name }}">{{ $produk->category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                   
                   
                   
                    
                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                
                <div class="row">
                    @foreach($product as $produk)
                    @if(Route::has('login'))
                    @auth
                    @if(Auth::user()->ceklevel === 'user')
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                                
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/user/front-category/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                        </div>
                    </div>
                    @elseif (Auth::user()->ceklevel === 'subsidi')
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                                
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/subsidi/front-category/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                                
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/admin/front-category/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                                
                            </div>
                            <div class="product__item__text">
                                <h6><a href="/front-category/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection