@extends('layouts.admin')


@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Tambah Data Kendaraan</h2>
        </div>
        <div class="card-body">
            <form action="{{route('data-kendaraan.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomor_polisi">Nomor Polisi</label>
                    <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror" required autofocus name="nomor_polisi" id="nomor_polisi" aria-describedby="nomor_polisi" placeholder="Brand" value="{{old ('nomor_polisi')}}">
                    @error('nomor_polisi')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="merk_kendaraan">Merk Kendaraan</label>
                    <input type="text" class="form-control @error('merk_kendaraan') is-invalid @enderror" required name="merk_kendaraan" id="merk_kendaraan" aria-describedby="merk_kendaraan" placeholder="merk_kendaraan" value="{{old ('merk_kendaraan')}}">
                    @error('merk_kendaraan')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi</label>
                    <select class="form-control" name="transmisi" id="transmisi">
                        
                        <option value="Matic">Matic</option>
                        <option value="Manual">Manual</option>
                       
                    </select>
                    @error('transmisi')
                    <div class="invalid-feeedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun_pembuatan">Tahun Pembuatan</label>
                    <input type="text" class="form-control @error('tahun_pembuatan') is-invalid @enderror" required name="tahun_pembuatan" id="tahun_pembuatan" aria-describedby="tahun_pembuatan" placeholder="tahun_pembuatan" value="{{old ('tahun_pembuatan')}}">
                    @error('tahun_pembuatan')
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