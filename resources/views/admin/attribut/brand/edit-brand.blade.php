@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Brand</h2>
        </div>
        <div class="card-body">
            <form action="/admin/brand/{{$brand->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror" required autofocus required name="name" id="name" aria-describedby="name" placeholder="Brand" value="{{old ('name')}}">
                    @error('name')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sales">Sales</label>
                    <input type="text" value="{{ $brand->sales}}" class="form-control @error('sales') is-invalid @enderror" required required name="sales" id="sales" aria-describedby="sales" placeholder="Sales" value="{{old ('sales')}}">
                    @error('sales')
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