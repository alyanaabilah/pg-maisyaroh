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
            <h2>Sisa Stok Barang</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <label for="Mulai">Mulai</label>
                                    <input type="date" id="tglawal">
                                    <label for="Akhir">Akhir</label>
                                <input type="date" id="tglakhir">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-body">
                                         <h5>Brand</h5>
                                         <form action="/cetak-brand/{brand}">
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="brand_id" id="brand">
                                                    @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                <button type="submit" class="input-group-text bg-info text-white">Filter</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                <label for="Category">Kategori</label>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach ($categories as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <button id="filter" onclick="filter()" class="btn btn-primary mt-4">Filter</button>


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
                            <td>{{ date('d F Y', strtotime($product->updated_at)) }}</td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    window.addEventListener('DOMContentLoaded', function () {
        $(document).ready(function () {
            document.getElementById("filter").addEventListener("click", function(event){
                event.preventDefault();
                var tglawal = $('#tglawal').val();
                var tglakhir = $('#tglakhir').val();
                var brand = $('#brand').val();
                var category = $('#category').val();
                window.open("{{('cetak-tanggal/')}}"+ tglawal + ":" tglakhir)
                window.open("{{('/cetak-brand/')}}"+ brand)
                window.open("{{('/cetak-kategori/')}}"+ category)
            });
        });
    });
</script>






@endsection