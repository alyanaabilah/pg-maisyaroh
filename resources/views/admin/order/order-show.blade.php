@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0" style="color: black;">
                        Detail Order User
                        
                        <a href="{{route('cetak.invoice', $order->id)}}" target="_blank" class="primary-btn cart-btn float-right py-1">Cetak Invoice</a>
                    </h6>
                    @if($order->order_status !="1")
                    <a href="{{route('orders.selesai', $order->id)}}" onclick="return confirm('Periksa Kembali Apakah Pesanan Selesai?')"class="btn btn-success mt-3">Pesanan Selesai </a>
                    @endif
                    @if($order->order_status == "1")
                    <label class="bg-success py-1 px-2 text-dark mt-3">&nbsp;Pesanan Selesai</label>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 style="color: black;">Detail Order</h5>
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="No Order">No Order</label>
                                <h6 style="color: black;">{{$order->order_no }}</h6>
                            </div>
                        </div>
                        <div class=" col-md-8 mt-3">
                            <div class="border p-2">
                                <label for="order Message">Konfirmasi User</label>
                                <h6 style="color: black;">
                                    @if($order->order_status == '3')
                                    Diterima User
                                    @elseif($order->order_status == '1')
                                    Telah Terkirim
                                    @else
                                    Belum Diterima User
                                    @endif</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Mode Pembayaran">Mode Pembayaran</label>
                                <h6 style="color: black;">
                                    @if($order->payment_mode == '1')
                                    COD
                                    @elseif($order->payment_mode == '2')
                                    Transfer Bank
                                    @elseif($order->payment_mode == '3')
                                    Pembayaran Ke Toko
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Status Pembayaran">Status Pembayaran</label>
                                <h6 style="color: black;">
                                    @if($order->payment_status == '0')
                                    Pending
                                    @elseif($order->payment_status == '1')
                                    COD - Terbayar
                                    @elseif($order->payment_status == '2')
                                    Transfer Bank - Sukses
                                    @elseif($order->payment_status == '3')
                                    Transfer Bank - Pending
                                    @elseif($order->payment_status == '4')
                                    Lunas
                                    @elseif($order->payment_status == '5')
                                    Pembayaran Di Toko
                                    @endif
                                </h6>
                               
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Bukti Transfer">Bukti Transfer</label>
                                @if($order->pengiriman == '1')
                                <h6 style="color: black;">COD</h6>
                                @elseif($order->pengiriman == '3')
                                <h6 style="color: black;">Pengambilan Ke Toko</h6>
                                @elseif($order->pengiriman == '2')
                                <h6 style="color: black;">Belum Transfer</h6>
                                @else
                                <img src="{{asset('storage/'. $order->image)}}" width="100px">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Order Status">Order Status</label>
                                <h6 style="color: black;">
                                    @if($order->order_status == '0')
                                    Pending
                                    @elseif($order->order_status == '1')
                                    Sukses
                                    @elseif($order->order_status == '2')
                                    Dibatalkan
                                    @elseif($order->order_status == '3')
                                    Diterima User
                                    @endif
                                </h6>
                            </div>
                            @if($order->pengiriman != "3" && $order->order_status == "0")
                            <td><a href="{{route('orders.approve', $order->id)}}" onclick="return confirm('Terima Pesanan?')"class="btn btn-primary mt-3">Terima</a></td>
                            @endif
                            <td><a href="{{route('orders.reject', $order->id)}}" onclick="return confirm('Tolak Pesanan?')" class="btn btn-danger mt-3">Tolak</a></td>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Pengiriman">Pengiriman</label>
                                <h6 style="color: black;">
                                    @if($order->pengiriman == '1')
                                    COD
                                    @elseif($order->pengiriman == '2')
                                    JNE
                                    @elseif($order->pengiriman == '3')
                                    Ambil Ke Toko
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-dark">
                    <h5>Rincian Pembelian</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Quantity</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderitem as $item)
                                    <tr>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>@currency($item->price)</td>
                                        <td>@currency($item->price * $item->quantity)</td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="3" class="text-right">Ongkos Kirim</td>
                                        <td>Rp. 10.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Total</td>
                                        <td>@currency($order->total_price + 10000)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 style="color: black;">Detail Pelanggan</h5>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="border p-2">
                                <label for="Nama">Nama</label>
                                <h6 style="color: black;">{{$order->name}}</h6>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="border p-2">
                                <label for="Nomor Telepon">Nomor Telepon</label>
                                <h6 style="color: black;">{{$order->phone_number}}</h6>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="border p-2">
                                <label for="Alamat">Alamat</label>
                                <h6 style="color: black;">{{$order->addres}}</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Provinsi">Provinsi</label>
                                <h6 style="color: black;">{{$order->provinces->name}}</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Kota/Kabupaten">Kota/Kabupaten</label>
                                <h6 style="color: black;">{{$order->regencies->name}}</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Kodepos">Kodepos</label>
                                <h6 style="color: black;">{{$order->zip_code}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection