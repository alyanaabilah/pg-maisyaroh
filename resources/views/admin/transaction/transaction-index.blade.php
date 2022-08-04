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
            <h2>Barang Terlaris</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mt-1">
                                <label for="Mulai">Mulai</label>
                                <input type="date" id="tglawal">
                            </div>
                            <div class="col-md-2 mt-1 ml-2">
                                <label for="Akhir">Akhir</label>
                                <input type="date" id="tglakhir">
                            </div>

                            <a href="" onclick="this.href='/terlaris-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; " target="_blank" class="btn btn-primary mt-4">Filter</a>


                        </div>
                    </div>
                </div>
            </div>
            <a href="/cetak-terlaris" target="_blank" class="btn btn-primary mb-3">Cetak Data</a>

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
                            <th width="200px">No Lacak</th>
                            <th>Pembeli</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)

                        <tr>
                            <td>{{$order->order->order_no}}</td>
                            <td>{{ $order->order->user->name }}</td>
                            <td>{{ $order->order->phone_number}}</td>
                            <td>@if($order->order->order_status == '0')
                                pending
                                @else
                                success
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