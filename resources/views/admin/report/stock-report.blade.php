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
            <h2>Product</h2>
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
                            <div class="col-md-3 mt-1 ml-2">
                                <label for="Brand">Brand</label>
                                <select class="form-control" name="brand_id" id="brand">
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="Category">Kategori</label>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach ($categories as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="" onclick="this.href='/cetak-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; this.href='/cetak-brand/'+document.getElementById('brand').value; this.href='/cetak-kategori/'+document.getElementById('category').value;" target="_blank" class="btn btn-primary mt-4">Filter</a>


                        </div>
                    </div>
                </div>
            </div>
            <a href="/cetak-stock" target="_blank" class="btn btn-primary mb-3">Cetak Data</a>
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

                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Stok</th>
                            <th>Update</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                        <tr>


                            <td>{{ $product->name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->updated_at }}</td>

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