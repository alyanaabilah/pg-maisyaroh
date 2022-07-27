@extends('layouts.user')
@section('content')

@include('front.partials.breadcrumb')


<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Alamat Pengiriman</h4>
            <form action="{{route('checkout.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">

                    @foreach($users as $user)
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" required autofocus name="name" id="name" aria-describedby="name" placeholder="Nama Product" value="{{Auth::user()->name}}" style="color:black">
                                    @error('name')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nomor Telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" required autofocus name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Nomor Telepon" value="{{ Auth::user()->phone_number }}" style="color:black">
                                    @error('phone_number')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="addres">Alamat</label>
                            <input type="text" class="form-control @error('addres') is-invalid @enderror" required autofocus name="addres" id="addres" aria-describedby="addres" placeholder="Alamat" value="{{Auth::user()->addres}}" style="color:black">
                            @error('addres')
                            <div class="invalid-feeedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="province">Provinsi Tujuan</label>
                                    <select class="wide form-control" name="province_id" id="province_id">
                                        @foreach ($provinces as $province)
                                        @if(old('province_id', $user->province_id)== $province->id)
                                        <option value="{{Auth::user()->province_id}}" selected>{{$province->name}}</option>
                                        @else
                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('province')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="regency">Kabupaten/Kota</label>
                                    <select id="regency" class="wide form-control" name="regency">
                                        @foreach ($regencies as $regency)
                                        @if(old('regency_id', $user->regency_id)== $regency->id)
                                        <option value="{{Auth::user()->regency_id}}" selected>{{$regency->name}}</option>
                                        @else
                                        <option value="{{$regency->id}}">{{$regency->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('regency')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="district">Kecamatan</label>
                                    <select id="district" class="wide form-control" name="district">
                                        <option>Pilih Kecamatan</option>
                                    </select>
                                    @error('district')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="village">Desa</label>
                                    <select id="village" class="wide form-control" name="village">
                                        <option>Pilih Desa</option>
                                    </select>
                                    @error('village')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Kodepos">Kodepos</label>
                                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" required autofocus name="zip_code" id="zip_code" aria-describedby="zipz-code" placeholder="Kodepos" value="{{Auth::user()->zip_code}}" style="color:black">
                                    @error('zip_code')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Negara">Negara</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" required autofocus name="country" id="country" aria-describedby="name" placeholder="Negara" value="{{Auth::user()->country}}" style="color:black">
                                    @error('country')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Pengiriman">Pengiriman</label>
                                    <select id="pengiriman" class="wide form-control" name="pengiriman">
                                        <option value="">Pilih Pengiriman</option>
                                        <option value="cod">COD</option>
                                        <option value="antar">Jasa Antar</option>
                                    </select>
                                    @error('country')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="note">Order notes</label>
                                    <input type="text" class="form-control" name="country" id="country" aria-describedby="name" placeholder="Note" style="color:black">
                                    @error('country')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Ship to?
                                <br>
                                <input type="radio" id="myself" name="ship_to" value="1">
                                <label for="myself">My Self</label><br>
                                <input type="radio" id="different" name="ship_to" value="0">
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-12 col-md-6">
                        <div class="checkout__order">
                            <h4>Pesanan</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="checkout__order__products">Products</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartitems as $cart)
                                    @php $total = 0; @endphp
                                    <tr>
                                        <td>{{$cart->product->name}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>@currency($cart->product->sell_price)</td>
                                        <td>@currency($cart->product->sell_price * $cart->quantity)</td>
                                        @php $total += $cart->product->sell_price * $cart->quantity; @endphp
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="checkout__input__checkbox">
                                <input type="radio" id="bank" name="delivery_method" value="Transfer Bank">
                                <label for="bank">Transfer Bank</label><br>
                                <input type="radio" id="cod" name="delivery_method" value="Cash On Delivery">
                                <label for="cod">Cash On Delivery</label><br>
                            </div>
                            <div class="checkout__order__subtotal">Ongkos Kirim<span>$750.99</span></div>
                            <div class="checkout__order__total">Total<span>Rp.{{ number_format($total) }}</span></div>
                            <div class="checkout__input__checkbox">
                            </div>
                            @if($cartitems->count() > 0)
                            <button type="submit" name="place_order" class="site-btn">Buat Pesanan</button>
                            @else
                            <button type="submit" class="site-btn fade">Buat Pesanan</button>
                            @endif
                        </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
<script>
    var shipping_different = document.getElementById('shipping_different');
    var delivery_div = document.getElementById('delivery');
    var showdelivery = function() {
        if (shipping_different.checked) {
            delivery_div.style['display'] = 'block';
        } else {
            delivery_div.style['display'] = 'none';
        }
    }
    shipping_different.onclick = showdelivery;
    showdelivery();


    window.addEventListener('DOMContentLoaded', function() {
        $(document).ready(function() {
            $('#province').on('change', function() {
                let province_id = $('#province').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/user-provinces",
                    data: {
                        province_id: province_id
                    },
                    cache: false,

                    success: function(msg) {
                        $('#regency').html(msg);
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            });

        });
    });
</script>


@endsection