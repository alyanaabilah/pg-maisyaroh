@extends('layouts.user')

@section('content')



@include('front.partials.hero')

@include('front.partials.categories')
@include('front.partials.featured')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Produk Terlaris</h2>
            </div>
            <div class="featured__controls">
            </div>
        </div>
    </div>
    <div class="row featured__filter">
        @foreach($order as $orderan)
        @if(Route::has('login'))
        @auth
        @if(Auth::user()->ceklevel === 'user')
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $orderan->product->image)}}">
                    
                </div>
                <div class="featured__item__text">
                    <h6><a href="/user/shop/{{$orderan->product->slug}}">{{ $orderan->product->name }}</a></h6>
                    <h5>@currency($orderan->product->sell_price)</h5>
                </div>
            </div>
        </div>
        @elseif(Auth::user()->ceklevel === 'subsidi')
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $orderan->product->image)}}">
                    
                </div>
                <div class="featured__item__text">
                    <h6><a href="/user/shop/{{$orderan->product->slug}}">{{ $orderan->product->name }}</a></h6>
                    <h5>@currency($orderan->product->sell_price)</h5>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $orderan->product->image)}}">
                    
                </div>
                <div class="featured__item__text">
                    <h6><a href="/admin/shop/{{$orderan->product->slug}}">{{ $orderan->product->name }}</a></h6>
                    <h5>@currency($orderan->product->sell_price)</h5>
                </div>
            </div>
        </div>
        @endif
        @else
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/'. $orderan->product->image)}}">
                    <ul class="featured__item__pic__hover">
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="/shop/{{$orderan->product->slug}}">{{ $orderan->product->name }}</a></h6>
                    <h5>@currency($orderan->product->sell_price)</h5>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach


    </div>
</div>




@endsection