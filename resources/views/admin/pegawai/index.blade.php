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
            <h2>Coba Pegawai</h2>
        </div>
        <div class="card-body">
            <a href="/admin/pegawai-coba/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                            <th>Nama</th>
                            <th>KTP</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orang as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->ktp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <form action="{{route('pegawai-coba.destroy', $item->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/pegawai-coba/{{$item->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
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