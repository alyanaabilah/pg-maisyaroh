@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Brand</h2>
        </div>
        <div class="card-body">
            <form action="{{route('brand.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Brand</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required autofocus name="name" id="name" aria-describedby="name" placeholder="Brand" value="{{old ('name')}}">
                    @error('name')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sales">Sales</label>
                    <input type="text" class="form-control @error('sales') is-invalid @enderror" required name="sales" id="sales" aria-describedby="sales" placeholder="Sales" value="{{old ('sales')}}">
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