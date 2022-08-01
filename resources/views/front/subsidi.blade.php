@extends('layouts.user')
@section('content')

@include('front.partials.breadcrumb')
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="container">
    <div class="row">

        <form action="/subsidi/coupon" method="POST">
            {{ csrf_field() }}
            @foreach($kupon as $kupon)
            <div class="card mt-5 mb-5 ml-2 mr-2 " style="width: 30rem;">
                <div class="card-body">
                    <input type="hidden" value="{{$kupon->id}}" class="coupon_id" name="coupon_id">
                    <p class="card-text"> Tipe : {{ $kupon->coupon_type }}
                        <br>
                        Harga : @currency($kupon->coupon_price)
                        <br>
                        Nama : {{ $kupon->coupon_name }}
                        <br>
                        Berakhir : {{ $kupon->end_datetime }}
                    </p>
                    <input type="checkbox" value="{{$kupon->id}}" class="coupon_id" name="coupon_id">
                    <br>
                    <button type="submit" class="btn btn-primary">Pakai</button>
                </div>
            </div>

            @endforeach
        </form>


    </div>
</div>



@endsection