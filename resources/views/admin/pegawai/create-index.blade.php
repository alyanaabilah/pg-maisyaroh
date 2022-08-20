@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Pegawai</h2>
        </div>
        <div class="card-body">
            <form action="{{route('pegawai-coba.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" required autofocus name="nama" id="nama" aria-describedby="nama" placeholder="Brand" value="{{old ('nama')}}">
                    @error('nama')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sales">KTP</label>
                    <input type="text" class="form-control @error('sales') is-invalid @enderror" required name="ktp" id="ktp" aria-describedby="sales" placeholder="Sales" value="{{old ('sales')}}">
                    @error('sales')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sales">Alamat</label>
                    <input type="text" class="form-control @error('sales') is-invalid @enderror" required name="alamat" id="alamat" aria-describedby="sales" placeholder="Sales" value="{{old ('sales')}}">
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