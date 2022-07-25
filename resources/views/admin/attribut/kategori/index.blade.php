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
            <h2>Kategori</h2>
        </div>
        <div class="card-body">
            <a href="/admin/category/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $kategori)

                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>

                            <td>{{ $kategori->name }}</td>
                            <td>
                                <img src="{{asset('storage/'. $kategori->image)}}" class="photo-kategori">
                            </td>
                            <td>{{ $kategori->slug }}</td>
                            <td>
                                <form action="{{route('category.destroy', ['category' => $kategori->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/category/{{$kategori->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
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