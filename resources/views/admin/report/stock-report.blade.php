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
                                 <a href="" onclick="this.href='/cetak-keuangan-tanggal/'+document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value; " target="_blank" class="btn bg-info text-white">Filter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <div class="card-body">
                                 <h5>Merk</h5>
                                 <form action="/cetak-brand/{brand:id}" method="GET" target="_blank">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="brand_id" id="brand">
                                            <option value="">Pilih Merk</option>
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
                            <div class="card-body">
                                 <h5>Kategori</h5>
                                 <form action="/cetak-kategori/{category:id}" method="GET" target="_blank">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="category_id" id="category">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->name}}</option>
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
                </div>
       
                            <a href="/cetak-stock" target="_blank" class="btn btn-primary mb-3">Cetak Semua Data</a>
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
                                            <th>Merk</th>
                                            <th>Stok</th>
                                            <th>Tanggal</th>


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
                                            <td>{{ $product->created_at }}</td>

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