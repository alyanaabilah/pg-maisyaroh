@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Barang Masuk</h2>
        </div>
        <div class="card-body">
            <form action="{{route('incoming-product.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product">Produk</label>
                    <select class="form-control" name="product_id" id="product_id">
                        @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('product')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" required name="quantity" id="quantity" aria-describedby="quantity" placeholder="quantity" value="{{old ('quantity')}}">
                    @error('quantity')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pembelian_price">Harga Beli Satuan</label>
                    <input type="text" class="form-control @error('pembelian_price') is-invalid @enderror" required name="pembelian_price" id="pembelian_price" aria-describedby="pembelian_price" placeholder="Harga Beli Satuan" value="{{old ('pembelian_price')}}">
                    @error('pembelian_price')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pembelian_ongkir">Harga Kirim Barang Satuan</label>
                    <h6 style="color: red">Biaya Kirim Satuan 2% Dari Harga Beli Satuan</h6>
                    <input type="text" class="form-control @error('pembelian_ongkir') is-invalid @enderror" required name="pembelian_ongkir" id="pembelian_ongkir" aria-describedby="pembelian_ongkir" placeholder="Harga Kirim Barang Satuan" value="{{old ('pembelian_ongkir')}}">
                    @error('pembelian_ongkir')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>




@endsection