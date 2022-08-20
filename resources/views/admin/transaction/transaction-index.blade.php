@extends('layouts.admin')
<style>
    td,
    th {

        color: black;
    }
</style>

@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Transaksi Pelanggan</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="mt-2">Tanggal Awal</h5>
                                <input type="date" id="tglawal" class="ml-2 mt-2">
                                <h5 class="mt-2 mb-2">Tanggal Akhir</h5>
                                <input type="date" id="tglakhir" class="ml-2 mt-2 mb-2">
                                <a href="" onclick="this.href='/transaksi-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; " target="_blank" class="btn bg-info text-white">Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <a href="/cetak-transaksi" target="_blank" class="btn btn-primary mt-3 mb-3">Cetak Data</a>

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if(session()->has('update'))
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" role="alert">
                {{ session('delete') }}
            </div>
            @endif


            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="200px">No Pesanan</th>
                            <th>Pembeli</th>
                            <th>Telepon</th> 
                            <th>Status<br>Pesanan</th>
                            <th>Total Belanja</th>
                            <th>Tanggal<br>Membeli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)

                        <tr>
                            <td>{{$order->order->order_no}}</td>
                            <td>{{ $order->order->user->name }}</td>
                            <td>{{ $order->order->phone_number}}</td>
                            <td>@if($order->order->order_status == '0')
                                Proses
                                @else
                                Sukses
                                @endif
                            </td>
                            <td>@currency($order->price * $order->quantity)</td>
                            <td>{{$order->created_at}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection