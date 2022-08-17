@extends('layouts.admin')

@section('content')

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
            <h2>Laporan Keuangan Harian</h2>
        </div>
        <div class="card">
            <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="mt-2">Tanggal Awal</h5>
                            <input type="date" id="tglawal" class="ml-2 mt-2">
                            <h5 class="mt-2 mb-2">Tanggal Akhir</h5>
                            <input type="date" id="tglakhir" class="ml-2 mt-2 mb-2">
                        </div>
                         <a href="" onclick="this.href='/cetak-user-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; " target="_blank" class="btn bg-info text-white">Filter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Total Pendapatan</th>
                            <th>Kuantitas Terjual</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                        <tr>
                            <td>{{date('d F Y', strtotime($item->date))}}</td>
                            <td>@currency($item->price)</td>
                            <td>{{$item->quantity}}</td>
                            <td><a href="/admin/transaction-orders" class="btn btn-primary">Detail</a></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection