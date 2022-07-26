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
                <div class="col-md-4">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="mt-2">Tanggal Awal</h5>
                                <input type="date" id="tglawal" class="ml-2 mt-2">
                                <h5 class="mt-2 mb-2">Tanggal Akhir</h5>
                                <input type="date" id="tglakhir" class="ml-2 mt-2 mb-2">
                            </div>
                             <a href="" onclick="this.href='/terlaris-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; " target="_blank" class="btn bg-info text-white">Filter</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <a href="/cetak-terlaris" target="_blank" class="btn btn-primary mt-3 mb-3">Cetak Semua Data</a>

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
                            <th>No</th>
                            <th width="250px">Produk</th>
                            <th>Brand</th>
                            <th>Kategori</th>
                            <th>Terjual</th>
                            <th>Total</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seller as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->brand->name }}</td>
                            <td>{{ $item->product->category->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>@currency( $item->price * $item->quantity)</td>
                            <td> <img src="{{asset('storage/'. $item->product->image)}}" width="100px"></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection