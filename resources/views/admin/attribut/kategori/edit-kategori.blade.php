@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Kategori</h2>
        </div>
        <div class="card-body">
            <form action="/admin/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Kategori</label>
                    <input type="text" value="{{old('name', $category->name)}}" class="form-control" required name="name" id="name" aria-describedby="name" placeholder="Nama Kategori">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input type="hidden" name="oldImage" value="{{$category->image}}">
                    @if($category->image)
                    <img src="{{asset('storage/'. $category->image)}}" img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Slug">Slug</label>
                    <input type="text" value="{{old('slug', $category->slug)}}" class="form-control" required name="slug" id="slug" aria-describedby="Slug" placeholder="Slug Kategori">
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
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