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
            <h2>Wilayah Terbanyak</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            


                        </div>
                    </div>
                </div>
            </div>
            <a href="/cetak-wilayah-terbanyak" target="_blank" class="btn btn-primary mb-3">Cetak Data</a>

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
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Total Pelanggan</th>
                            <th>Total Pembelian</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wilayah as $item)
                        
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->regency_name }}</td>
                            <td>{{ $item->province_name }}</td>
                            <td>{{ $item->most_orders}}</td>
                            <td>@currency($item->total_price)</td>
                            
                           
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection