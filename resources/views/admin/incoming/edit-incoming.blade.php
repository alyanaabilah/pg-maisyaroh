@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Brand</h2>
        </div>
        <div class="card-body">
            <form action="/admin/incoming-product/{{$incoming->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="product">Product</label>
                    <select class="form-control" name="product_id">
                        @foreach ($products as $product)
                        @if(old('product_id', $product->product_id)== $product->id)
                        <option value="{{$product->id}}" selected>{{$product->name}}</option>
                        @else
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endif
                        @endforeach
                        @error('product')
                        <div class="invalid-feeedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" value="{{ $incoming->quantity}}" class="form-control @error('quantity') is-invalid @enderror" required required name="quantity" id="quantity" aria-describedby="quantity" placeholder="Quantity" value="{{old ('quantity', $incoming->quantity)}}">
                    @error('quantity')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pembelian_price">Harga Beli Satuan</label>
                    <input type="text" value="{{ $incoming->pembelian_price}}" class="form-control @error('pembelian_price') is-invalid @enderror" required name="pembelian_price" id="pembelian_price" aria-describedby="pembelian_price" placeholder="Harga Beli Satuan" value="{{old ('pembelian_price')}}">
                    @error('pembelian_price')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pembelian_ongkir">Harga Kirim Barang Satuan</label>
                    <h6 style="color: red">Biaya Kirim Satuan 2% Dari Harga Beli Satuan</h6>
                    <input type="text" value="{{ $incoming->pembelian_ongkir}}" class="form-control @error('pembelian_ongkir') is-invalid @enderror" required name="pembelian_ongkir" id="pembelian_ongkir" aria-describedby="pembelian_ongkir" placeholder="Harga Kirim Barang Satuan" value="{{old ('pembelian_ongkir')}}">
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