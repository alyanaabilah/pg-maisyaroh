@extends('layouts.admin')
<style>
    td,
    th {

        color: black;

    }

    .scrollBox {
        overflow-x: auto;
        overflow-y: hidden;
        -ms-overflow-x: auto;
        -ms-overflow-y: hidden;
        white-space: nowrap;
    }

    .scrollBox>div {
        display: inline-block;
        margin-right: 10px;
    }

    .scrollBox>div fieldset {
        height: 200px;
        width: 300px;
    }
</style>


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Permintaan Pesanan Barang</h2>
        </div>
        <div class="card-body">
            <a href="/admin/pesanan-barang/create" class="btn btn-primary mb-3">Tambah Data</a>
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session()->has('update'))
            <div class="alert alert-warning" role="alert">
                {{ session('update') }}
            </div>
            @endif
            @if(session()->has('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            <div class="scrollBox">

                <table class="table table-bordered table-hover scroll-horizontal-vertical">
                    <thead>
                        <tr>

                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Image</th>
                            <th>Sisa<br>Stok</th>
                            <th>Kebutuhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $pesan)

                        <tr>


                            <td>{{ $pesan->product->name }}</td>
                            <td>{{ $pesan->product->product_code }}</td>
                            <td>{{ $pesan->product->category->name }}</td>
                            <td>{{ $pesan->product->brand->name }}</td>
                            <td>
                                <img src="{{asset('storage/'. $pesan->product->image)}}" width="100px">
                            </td>
                            <td>{{ $pesan->product->stock }}</td>
                            <td>{{ $pesan->kebutuhan }}</td>
                            <td>
                                <a href="{{route('pesanan-barang.edit', $pesan->id)}}" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
                                <form method="POST" action="{{route('pesanan-barang.destroy', $pesan->id)}}" class="d-inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
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
</div>
</div>








@endsection