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
            <h2>Brand</h2>
        </div>
        <div class="card-body">
            <a href="/admin/brand/create" class="btn btn-primary mb-3">Cetak Data</a>



            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Minggu 1</th>
                            <th>Minggu 2</th>
                            <th>Minggu 3</th>
                            <th>Minggu 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kupon as $kupon)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kupon->user->name }}</td>
                            <td>{{ $kupon->coupon->coupon_name }}</td>
                            <td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>






@endsection