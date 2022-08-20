@extends('layouts.admin')
<style>
    td,
    th {

        color: black;
    }
</style>

@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Data Kendaraan</h2>
        </div>
        <div class="card-body">
            <a href="/admin/data-kendaraan/create" class="btn btn-primary mb-3">Tambah Data</a>
            <a href="/cetak-kendaraan" target="_blank" class="btn btn-primary mb-3">Cetak Semua Data</a>
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if(session()->has('update'))
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" role="alert">
                {{ session('delete') }}
            </div>
            @endif


            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Polisi</th>
                            <th>Merk Kendaraan</th>
                            <th>Transmisi</th>
                            <th>Tahun Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kendaraan as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{ $item->nomor_polisi }}</td>
                            <td>{{ $item->merk_kendaraan }}</td>
                            <td>{{ $item->transmisi }}</td>
                            <td>{{ $item->tahun_pembuatan }}</td>
                            <td>
                                <form action="{{route('data-kendaraan.destroy', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/data-kendaraan/{{$item->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
                                    <button type="submit" class="mb-2 btn btn-sm btn-danger border-0" onclick="return confirm('Data Akan Dihapus, Yakin?')">DELETE</button>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection