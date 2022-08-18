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

@include('front.partials.breadcrumb')

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Telepon</h4>
                    <p>0822-5511-1410</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Alamat</h4>
                    <p>Sungai Sipai, Martapura</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Operasional</h4>
                    <p>09:00  sampai 20:00 </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>pg-maisyaroh@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3982.675472989352!2d114.82993841171265!3d-3.4289532812272383!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681991dd83ab3%3A0x95c510c10bb18da5!2sJl.%20Lestari%20IV%20No.31%2C%20Loktabat%20Utara%2C%20Kec.%20Banjarbaru%20Utara%2C%20Kota%20Banjar%20Baru%2C%20Kalimantan%20Selatan%2070714!5e0!3m2!1sen!2sid!4v1660769105670!5m2!1sen!2sid" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Toko Peralatan Kompor<br>Pangkalan Gas Maisyaroh</h4>
            
        </div>
    </div>
</div>
<!-- Map End -->
@endsection