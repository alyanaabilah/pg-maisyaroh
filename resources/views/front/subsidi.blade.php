@extends('layouts.user')
@section('content')

@include('front.partials.breadcrumb')
<div class="container">
    <div class="row">
        @foreach($kupon as $kupon)
        <div class="card mt-5 mb-5 ml-2 mr-2 " style="width: 16rem;">
            <div class="card-body">
                <p class="card-text"> Tipe : {{ $kupon->coupon_type }}
                    <br>
                    Harga : @currency($kupon->coupon_price)
                    <br>
                    Nama : {{ $kupon->coupon_name }}
                    <br>
                    Berakhir : {{ $kupon->end_datetime }}
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card mt-5 mb-5 ml-5 mr-2  " style="width: 15rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card mt-5 mb-5 ml-5 mr-2 " style="width: 15rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card mt-5 mb-5 ml-5 mr-0 " style="width: 15rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a><!-- buttonnya jadi create atau store dan indexnya ke report subsidi di admin-->
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection