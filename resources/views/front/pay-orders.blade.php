@extends('layouts.user')

@section('content')

@include('front.partials.breadcrumb')

<section class="shoping-cart spad">

    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="/user/my-orders" class="primary-btn cart-btn">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-6 order-details">
                    <h4>Detail Penerima</h4>
                    <hr>
                    <label for="name">Nama</label>
                    <div class="border">{{$order->name}}</div>
                    <label for="addres" class="mt-2">Alamat</label>
                    <div class="border">{{ $order->addres }}</div>
                    <label for="province" class="mt-2">Provinsi</label>
                    <div class="border">{{$order->provinces_id}}</div>
                    <label for="regency" class="mt-2">Kabupaten/Kota</label>
                    <div class="border">{{$order->regencies_id}}</div>
                    <label for="zip_code" class="mt-2">Kode Pos</label>
                    <div class="border">{{$order->zip_code}}</div>
                    <label for="phone_number" class="mt-2">Nomor Telepon</label>
                    <div class="border">{{$order->phone_number}}</div>
                    <form action="{{route('my-orders.store')}}" method="POST" enctype="multipart/form-data">
                        <label for="Image">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" class="@error('image') is-invalid @enderror" name="image" id="image" aria-describedby="image" onchange="previewImage()">
                        <br>
                        <button type="submit" class="btn btn-primary mt-3">Simpan Bukti</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h4>Detail Pemesanan</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderitem as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>@currency($item->price)</td>
                                <td>
                                    <img src="{{asset('storage/'. $item->product->image)}}" width="50px">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 class="px-2">Total: <span class="float-end">@currency($order->total_price)</span></h4>
                </div>
            </div>

        </div>

    </div>


    </div>


    </div>

</section>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>








@endsection