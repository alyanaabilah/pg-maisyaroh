@extends('layouts.user')
@section('content')

@include('front.partials.breadcrumb')


<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Alamat Pengiriman</h4>
            <form action="/user/checkout" method="POST">
                {{ csrf_field() }}
                <div class="row">

                    @foreach($users as $user)
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control name @error('name') is-invalid @enderror" required autofocus name="name" id="name" aria-describedby="name" placeholder="Nama Product" value="{{Auth::user()->name}}" style="color:black">
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
                                    <input type="text" class="form-control phone_number @error('phone_number') is-invalid @enderror" required autofocus name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Nomor Telepon" value="{{ Auth::user()->phone_number }}" style="color:black">
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
                            <input type="text" class="form-control addres @error('addres') is-invalid @enderror" required autofocus name="addres" id="addres" aria-describedby="addres" placeholder="Alamat" value="{{Auth::user()->addres}}" style="color:black">
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
                                        <option value="1">COD</option>
                                        <option value="2">JNE - Transfer</option>
                                        <option value="3">Ambil Ke Toko</option>
                                    </select>
                                    @error('pengiriman')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="note">Order notes</label>
                                    <input type="text" class="form-control" name="note" id="note" aria-describedby="name" placeholder="Note" style="color:black">
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
                                Kirim Ke?
                                <br>
                                <input type="radio" id="myself" name="ship_to" value="1">
                                <label for="myself">Alamat Saya</label><br>
                                <input type="radio" id="different" name="ship_to" value="0">
                                <label for="other">Alamat Lain</label>
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

                                    @php $total = 0; @endphp
                                    @foreach($cartitems as $cart)

                                    <tr>
                                        <td>{{$cart->product->name}}</td>
                                        <td>{{$cart->quantity}}</td>

                                        <td>@currency($cart->product->sell_price)</td>
                                        @php $total += $cart->product->sell_price * $cart->quantity; @endphp
                                        <td>@currency($cart->product->sell_price * $cart->quantity)</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <section>
                                <div class="checkout__order__subtotal">Ongkos Kirim<span>Rp.10.000</span></div>
                                <div class="checkout__order__total">Total<span>Rp.{{ number_format($total + 10000) }}</span></div>
                                <div class="checkout__input__checkbox">
                            </section>

                            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                        </div>

                    </div>

                </div>


        </div>
        </form>
    </div>
    </div>
</section>
<!-- Checkout Section End -->
<script>
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