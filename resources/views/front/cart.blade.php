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
                        <span>Kategori</span>
                    </div>
                    <ul>
                        @foreach ($product as $produk)
                        <li><a href="/front-category/{{ $produk->category->name }}">{{ $produk->category->name }}</a></li>
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
    </div>
</section>
<!-- Hero Section End -->

@include('front.partials.breadcrumb')

<!-- Shoping Cart Section Begin -->

<section class="shoping-cart spad">
    @php $total = 0; @endphp
    @if($cartitems->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table ">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produk</th>
                                <th>Harga</th>
                                <th>Kuantitas</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($cartitems as $cart)
                        <tbody class="product_data">
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset('storage/'. $cart->product->image)}}" height="60px" width="60px" alt="">
                                    @if(Auth::user()->ceklevel === 'user')
                                    <a href="/user/shop/{{$cart->product->slug}}" style="color: black;">{{$cart->product->name}}</a>
                                    @elseif(Auth::user()->ceklevel === 'subsidi')
                                    <a href="/user/shop/{{$cart->product->slug}}" style="color: black;">{{$cart->product->name}}</a>
                                    @else
                                    <a href="/admin/shop/{{$cart->product->slug}}" style="color: black;">{{$cart->product->name}}</a>
                                    @endif
                                </td>
                                <td class="shoping__cart__price">
                                    @if($cart->product->stock >= $cart->quantity)
                                    @currency($cart->product->sell_price)
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <input type="hidden" value="{{$cart->product_id}}" class="prod_id">
                                        <div class="input-group text-center mb-3 ml-5" style="width:130px">
                                            <button class="input-group-text changeQuantity increment-btn">+</button>
                                            <input type="text" class="form-control qty-input text-center" name="quantity" value="{{ $cart->quantity }}">
                                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        </div>
                                    </div>
                                </td>
                                @php $total += $cart->product->sell_price * $cart->quantity; @endphp
                                <td class="shoping__cart__total">
                                    @currency($cart->product->sell_price * $cart->quantity)
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close delete-cart-item border-0"></span>
                                </td>
                                @else
                                <h3 style="font-size: 24px; font-weight: 700; text-align:center; color:red">Barang Habis</h3>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    @if(Auth::user()->ceklevel == 'user')
                    <a href="/user/shop" class="primary-btn cart-btn">LANJUT BELANJA</a>
                    @elseif(Auth::user()->ceklevel == 'subsidi')
                    <a href="/subsidi/shop" class="primary-btn cart-btn">LANJUT BELANJA</a>
                    @else
                    <a href="/admin/shop" class="primary-btn cart-btn">LANJUT BELANJA</a>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <input type="text" readonly class="input border-0" value="Rp.{{ number_format($total) }}"></li>
                    </ul>
                    @if(Auth::user()->ceklevel == 'user')
                    <a href="/user/checkout" class="primary-btn">CHECKOUT</a>
                    @elseif(Auth::user()->ceklevel == 'subsidi')
                    <a href="/subsidi/checkout" class="primary-btn">CHECKOUT</a>
                    @else
                    <a href="/admin/checkout" class="primary-btn">CHECKOUT</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="text-center" style="padding: 30px 0;">
        <h3 class="card-title">Keranjang Belanja Kamu Kosong Nih</h3>
        <h4 class="card-text">Ayo Tambah Ke Keranjang Sekarang!</h4>
        @if(Auth::user()->ceklevel === 'user')
        <a href="/user/shop" class="btn btn-success mt-2">Pilih Produk</a>
        @elseif(Auth::user()->ceklevel == 'subsidi')
        <a href="/subsidi/shop" class="btn btn-success mt-2">Pilih Produk</a>
        @else
        <a href="/admin/shop" class="btn btn-success mt-2">Pilih Produk</a>
        @endif
    </div>

    @endif
</section>

<!-- Shoping Cart Section End -->


@endsection