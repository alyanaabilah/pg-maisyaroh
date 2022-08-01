@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Product</h2>
        </div>
        <div class="card-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_code">Kode Product</label>
                    <input type="text" class="form-control @error('product_code') is-invalid @enderror" required name="product_code" id="product_code" aria-describedby="product_code" placeholder="Kode Product" value="{{old ('product_code')}}">
                    @error('product_code')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Product</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required autofocus name="name" id="name" aria-describedby="name" placeholder="Nama Product" value="{{old ('name')}}">
                    @error('name')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Category">Kategori</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('Category')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Brand">Brand</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        @foreach ($brands as $brand)
                        @if(old('brand_id') == $brand->id)
                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                        @else
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('brand')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sell_price">Harga Jual</label>
                    <input type="text" class="form-control @error('sell_price') is-invalid @enderror" required name="sell_price" id="sell_price" aria-describedby="sell_price" placeholder="Harga Jual" value="{{old ('sell_price')}}">
                    @error('sell_price')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sales_price">Harga Sales</label>
                    <input type="text" class="form-control @error('sales_price') is-invalid @enderror" required name="sales_price" id="sales_price" aria-describedby="sales_price" placeholder="Harga Sales" value="{{old ('sales_price')}}">
                    @error('sales_price')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" required name="slug" id="slug" aria-describedby="slug" placeholder="Slug" value="{{old ('slug')}}">
                    @error('slug')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" required name="description" id="description" aria-describedby="description" placeholder="Deskripsi" value="{{old ('description')}}">
                    @error('description')
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

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>



@endsection