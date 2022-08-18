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
                        @foreach ($brands as $produk)
                         <li><a href="/front-brand/{{ $produk->name }}">{{ $produk->name }}</a></li>
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


<!-- Breadcrumb Section Begin -->

@include('front.partials.breadcrumb')
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        @if(session('status'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    Toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: "{{session('status')}}"
                })
            })
        </script>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Kategori</h4>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="/front-category/{{ $category->name }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                   


                   
                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                
                <div class="row">
                    @foreach($product as $produk)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'. $produk->image)}}">
                                <ul class="product__item__pic__hover">
                                    <input type="hidden" value="{{$produk->id}}" class="prod_id">
                                    
                                </ul>
                            </div>
                            @if(Route::has('login'))
                            @auth
                            @if(Auth::user()->ceklevel === 'user')
                            <div class="product__item__text">
                                <h6><a href="/user/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                            @elseif(Auth::user()->ceklevel === 'subsidi')
                            <div class="product__item__text">
                                <h6><a href="/subsidi/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                            @else
                            <div class="product__item__text">
                                <h6><a href="/admin/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                            @endif
                            @else
                            <div class="product__item__text">
                                <h6><a href="/shop/{{$produk->slug}}">{{ $produk->name }}</a></h6>
                                <h5>@currency($produk->sell_price)</h5>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>

                    @endforeach
                </div>
               
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->



@endsection