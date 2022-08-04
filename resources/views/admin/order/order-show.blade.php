@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0" style="color: black;">
                        Detail
                        <a href="{{route('cetak.invoice', $order->id)}}" class="primary-btn cart-btn float-right py-1">Cetak Invoice</a>
                    </h6>
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
                                <label for="order Message">Order Message</label>
                                <h6 style="color: black;">{{(!isset($order->order_msg))== true ? $order->order_msg:'Tidak Ada Pesan' }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Mode Pembayaran">Mode Pembayaran</label>
                                <h6 style="color: black;">
                                    {{ $order->payment_mode }}
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
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Bukti Transfer">Bukti Transfer</label>
                                <img src="{{asset('storage/'. $order->image)}}" width="100px">
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
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="border p-2">
                                <label for="Cancelled Reason">Alasan Pembatalan</label>
                                <h6 style="color: black;">{{(isset($order->cancel_reason))== true ? $order->cancel_reason:'Tidak Ada Pesan' }}</h6>
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