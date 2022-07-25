@extends('layouts.user')

@section('content')

@include('front.partials.breadcrumb')

<section class="shoping-cart spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" readonly class="form-control" required autofocus name="name" id="name" aria-describedby="name" placeholder="Nama" style="color:black">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="addres">Alamat</label>
                                <input type="text" readonly class="form-control" name="addres" id="addres" aria-describedby="addres" placeholder="Alamat" style="color:black">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="province">Provinsi</label>
                                        <input type="text" readonly class="form-control" name="province" id="province" aria-describedby="province" placeholder="Provinsi" style="color:black">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="regency">Kabupaten/Kota</label>
                                        <input type="text" readonly class="form-control" name="regency" id="regency" aria-describedby="regency" placeholder="Kabupaten/Kota" style="color:black">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Nomor Telepon">Nomor Telepon</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" required autofocus name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Nomor Telepon" style="color:black">
                                        @error('phone_number')
                                        <div class="invalid-feeedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <a href="#" class="mb-2 btn btn-sm btn-success border-0">Edit Data</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">

                    <a href="/user/home" class="primary-btn cart-btn">Beranda</a>

                    <a href="/user/shop" class="primary-btn cart-btn cart-btn-right">
                        Belanja</a>

                </div>
            </div>


        </div>
    </div>

</section>







@endsection