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
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@include('front.partials.breadcrumb')



<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <h4>Profil</h4>
            @foreach($users as $user)
            <form>
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" readonly class="form-control" name="name" id="name" aria-describedby="name" placeholder="Nama" value="{{ $user->name}}" style="color:black">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" readonly class="form-control" name="username" id="username" aria-describedby="name" placeholder="Username" value="{{ $user->username}}" style="color:black">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="addres">Alamat</label>
                            <input type="text" readonly class="form-control" name="addres" id="addres" aria-describedby="addres" placeholder="Alamat" value="{{ $user->addres}}" style="color:black">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="province">Provinsi</label>
                                    <input type="text" readonly class="form-control" name="province" id="province" aria-describedby="province" placeholder="Provinsi" value="{{$user->province_id}}" style="color:black">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="regency">Kabupaten/Kota</label>
                                    <input type="text" readonly class="form-control" name="regency" id="regency" aria-describedby="regency" placeholder="Kabupaten/Kota" value="{{ $user->regency_id}}" style="color:black">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="district">Kecamatan</label>
                                    <input type="text" readonly class="form-control" name="district" id="district" aria-describedby="district" placeholder="Kecamatan" style="color:black">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="village">Kelurahan/Desa</label>
                                    <input type="text" readonly class="form-control" name="village" id="village" aria-describedby="village" placeholder="Kelurahan/Desa" style="color:black">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Kodepos">Kodepos</label>
                                    <input type="text" readonly class="form-control" name="zip_code" id="zip_code" aria-describedby="name" placeholder="Kodepos" value="{{ $user->zip_code}}" style="color:black">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Negara">Negara</label>
                            <input type="text" readonly class="form-control" required autofocus name="country" id="country" aria-describedby="name" placeholder="Negara" value="{{ $user->country}}" style="color:black">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nomor Telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" required autofocus name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Nomor Telepon" value="{{old ('phone_number', $user->phone_number)}}" style="color:black">
                                    @error('phone_number')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" required autofocus name="Email" id="Email" aria-describedby="Email" placeholder="Email" value="{{old ('email', $user->email)}}" style="color:black">
                                    @error('Email')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <a href="/user/my-profile/{{$user->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">Edit Data</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
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
            $('#regency').on('change', function() {
                let regency_id = $('#regency').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/user-regencies",
                    data: {
                        regency_id: regency_id
                    },
                    cache: false,

                    success: function(msg) {
                        $('#district').html(msg);
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            });
            $('#district').on('change', function() {
                let district_id = $('#district').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/user-districts",
                    data: {
                        district_id: district_id
                    },
                    cache: false,

                    success: function(msg) {
                        $('#village').html(msg);
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            });
        });
    });
</script>
@if(session('success'))
<script>
    Swal.fire("{{session('success')}}");
</script>
@endif
@endsection