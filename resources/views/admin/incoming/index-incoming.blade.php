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
            <h2>Product Masuk</h2>
        </div>
        <div class="card-body">
            <a href="/admin/incoming-product/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                            <th>Produk</th>
                            <th>Quantity</th>
                            <th>Harga Beli</th>
                            <th>Total Harga<br>Beli</th>
                            <th>Ongkir Barang</th>
                            <th>Total Ongkir</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomings as $incoming)

                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{ $incoming->product->name }}</td>
                            <td>{{ $incoming->quantity }}</td>
                            <td>@currency($incoming->pembelian_price)</td>
                            <td> @currency($incoming->pembelian_price * $incoming->quantity) </td>
                            <td> @currency($incoming->pembelian_ongkir) </td>
                            <td> @currency($incoming->pembelian_ongkir*$incoming->quantity) </td>
                            <td>{{ date('d F Y', strtotime($incoming->updated_at)) }}</td>
                            <td>
                                <form method="POST" action="{{route('incoming-product.destroy', $incoming->id)}}" class="d-inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <a href="/admin/incoming-product/{{$incoming->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
                                    <button type="submit" class="mb-2 btn btn-sm btn-danger border-0" onclick="return confirm('Data Akan Dihapus, Yakin?')">DELETE</button>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection