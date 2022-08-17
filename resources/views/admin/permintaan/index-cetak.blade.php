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
            <h2>Pesanan Barang</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-body">
                                         <h5>Merk</h5>
                                         <form action="/pesanan-brand/{brand:id}" method="GET" target="_blank">
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
                        </div>
                    </div>
                </div>
            </div>
           
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
                            <th width = "50px">No</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Sales</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $pesan)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $pesan->product->name }}</td>
                            <td>{{ $pesan->product->category->name }}</td>
                            <td>{{ $pesan->product->brand->name }}</td>
                            <td>{{ $pesan->product->brand->sales }}</td>
                            <td><input type="hidden" value="{{$pesan->id}}" class="kebutuhan">{{ $pesan->kebutuhan }}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function dataTerpilih()
    {
        let checkbox-terpilih = $()
    }
</script>








@endsection