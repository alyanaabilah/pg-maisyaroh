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
            <h2>Product</h2>
        </div>
        <div class="card-body">
            <a href="{{route('product.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
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
            <div class="scrollBox">

                <table class="table table-bordered table-hover scroll-horizontal-vertical">
                    <thead>
                        <tr>

                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Harga Jual</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                        <tr>


                            <td>{{ $product->name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>@currency($product->sell_price)</td>
                           
                            <td>{{ $product->slug }}</td>
                            <td>
                                <img src="{{asset('storage/'. $product->image)}}" width="150px">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
                                <form method="POST" action="{{route('product.destroy', $product->id)}}" class="d-inline">
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