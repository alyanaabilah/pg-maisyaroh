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
            <h4>Edit Profile</h4>

            <form action="/user/my-profile/{$users->id}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" required autofocus name="name" id="name" aria-describedby="name" placeholder="Nama Product" value="{{old ('name', $users->name)}}" style="color:black">
                                    @error('name')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" required autofocus name="username" id="username" aria-describedby="name" placeholder="Username" value="{{old ('username', $users->username)}}" style="color:black">
                                    @error('name')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="addres">Alamat</label>
                            <input type="text" class="form-control @error('addres') is-invalid @enderror" required autofocus name="addres" id="addres" aria-describedby="addres" placeholder="Alamat" value="{{old ('addres', $users->addres)}}" style="color:black">
                            @error('addres')
                            <div class="invalid-feeedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="province">Provinsi</label>
                                    <select class="wide form-control " name="province" id="province">
                                        <option>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                        @if(old('province_id', $users->province_id)== $province->id)
                                        <option value="{{$province->id}}" selected>{{$province->name}}</option>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="regency">Kabupaten/Kota</label>
                                    <select id="regency" class="form-control " name="regency">
                                        <option>Pilih Kabupaten/Kota</option>

                                    </select>
                                    @error('regency')
                                    <div class=" invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="district">Kecamatan</label>
                                    <select id="district" class="form-control " name="district">
                                        <option>Pilih Kecamatan</option>

                                    </select>
                                    @error('district')
                                    <div class=" invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="village">Kelurahan/Desa</label>
                                    <select id="village" class="wide form-control " name="village">
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
                                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" autofocus name="zip_code" id="zip_code" aria-describedby="name" placeholder="Kodepos" value="{{old ('zip_code', $users->zip_code)}}" style="color:black">
                                    @error('zip_code')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Negara">Negara</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" autofocus name="country" id="country" aria-describedby="name" placeholder="Negara" value="{{old ('country', $users->country)}}" style="color:black">
                            @error('country')
                            <div class="invalid-feeedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nomor Telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" autofocus name="phone_number" id="phone_number" aria-describedby="phone_number" placeholder="Nomor Telepon" value="{{old ('phone_number', $users->phone_number)}}" style="color:black">
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
                                    <input type="text" readonly class="form-control @error('email') is-invalid @enderror" name="Email" id="Email" aria-describedby="Email" placeholder="Email" value="{{old ('email', $users->email)}}" style="color:black">
                                    @error('Email')
                                    <div class="invalid-feeedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-btn">Simpan Data</button>
                    </div>
                </div>
            </form>

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