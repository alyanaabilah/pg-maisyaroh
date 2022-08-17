@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Product</h2>
        </div>
        <div class="card-body">
            <form action="{{route('pesanan-barang.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_id">Nama Produk</label>
                    <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                        @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id">
                        @foreach ($brands as $merk)
                        <option value="{{$merk->id}}">{{$merk->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kebutuhan">Kebutuhan</label>
                    <input type="text" class="form-control @error('kebutuhan') is-invalid @enderror" required name="kebutuhan" id="kebutuhan" aria-describedby="kebutuhan" placeholder="Kebutuhan" value="{{old ('kebutuhan')}}">
                    @error('kebutuhan')
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