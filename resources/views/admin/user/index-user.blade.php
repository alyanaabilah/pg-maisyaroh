@extends('layouts.admin')
<style>
    td,
    th {

        color: black;
    }
    .scrollBox {
        overflow-x: auto;
        overflow-y: hidden;
        -ms-overflow-x: auto;
        -ms-overflow-y: hidden;
        white-space: nowrap;
    }

    .scrollBox>div {
        display: inline-block;
        margin-right: 10px;
    }

    .scrollBox>div fieldset {
        height: 200px;
        width: 300px;
    }
</style>

@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User</h2>
        </div>
        <div class="card-body">
            <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
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

            <div class="scrollBox">
                <table class="table table-bordered table-hover scroll-horizontal-vertical">
                    <thead>
                        <tr>

                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Kodepos</th>
                            <th>Telepon</th>
                            <th>Negara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        <tr>


                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ceklevel }}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->addres}}</td>
                            <td>{{$user->province_id}}</td>
                            <td>{{ $user->regency_id }}</td>
                            <td>{{ $user->zip_code }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->country }}</td>
                            <td>
                                <form action="{{route('user.destroy', ['user' => $user->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/user/{{$user->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
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