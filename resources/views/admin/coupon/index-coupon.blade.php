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
            <h2>Kupon Subsidi</h2>
        </div>
        <div class="card-body">
            <a href="/admin/coupon/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                            <th width="50px">No</th>
                            <th>Kode</th>
                            <th>Kupon</th>
                            <th>Tipe</th>
                            <th width="150px">Harga</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($coupon as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->coupon_code }}</td>
                            <td width="200px">{{ $item->coupon_name }}</td>
                            <td> @if($item->type == "1")
                                <label class="badge badge-pill badge-primary">Diskon</label>
                                @else
                                <label class="badge badge-pill badge-success">Subsidi</label>
                                @endif

                            </td>
                            <td width="100px">@currency($item->coupon_price)</td>
                            <td>
                                Awal : {{ $item->start_datetime }}
                                <br>
                                Akhir : {{ $item->end_datetime }}
                            </td>
                            <td>
                                @if($item->status == "1")
                                <label class="badge badge-pill badge-danger">Nonaktif</label>
                                @else
                                <label class="badge badge-pill badge-success">Aktif</label>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('coupon.destroy', ['coupon' => $item->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/coupon/{{$item->id}}/edit" class="mb-2 btn btn-sm btn-success border-0">EDIT</a>
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