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
                    <label for="pengiriman" class="mt-2">Pengiriman</label>
                    @if($order->pengiriman == "1")
                        <div class="border">COD</div>
                    @elseif($order->pengiriman == "2")
                        <div class="border">JNE</div>
                    @elseif($order->pengiriman == "3")
                        <div class="border">POS</div>
                    @elseif($order->pengiriman == "4")
                        <div class="border">Ambil Di Toko</div>
                    @else
                         <div class="border">-</div>
                    @endif
                    <label for="phone_number" class="mt-2">Nomor Telepon</label>
                    <div class="border">{{$order->phone_number}}</div>
                    @if($order->pengiriman != "4")
                    <form action="/user/my-orders/{{$order->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="Image">Image</label>
                        <input type="hidden" name="oldImage" value="{{$order->image}}">
                        @if($order->image)
                        <img src="{{asset('storage/'. $order->image)}}" img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="file" class="@error('image') is-invalid @enderror" name="image" id="image" aria-describedby="image" onchange="previewImage()">
                        <br>
                        <button type="submit" class="btn btn-primary mt-3">Simpan Bukti</button>
                    </form>
                    @endif
                </div>

                <div class="col-md-6">
                    <h4>Detail Pemesanan</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Bukti</th>
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
                    @if($order->pengiriman != "4")
                    <h4 class="px-2">Total + Ongkir: <span class="float-end">@currency($order->total_price + 10000)</span></h4>
                    @else
                    <h4 class="px-2">Total: <span class="float-end">@currency($order->total_price)</span></h4>
                    @endif

                    <br>
                    <br>
                    <div class="col-md-6 mt-5">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4>Transfer</h4>
                                Silahkan Transfer Melalui:
                                Bank Mandiri 021 000 43871
                                a.n Maisyaroh
                            </div>
                    </div>
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