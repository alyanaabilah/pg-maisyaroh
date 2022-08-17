@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0" style="color: black;">
                        Detail Order User
                        <a href="#" target="_blank" class="primary-btn cart-btn float-right py-1">Cetak Invoice</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 style="color: black;">Detail Order</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Total Pendapatan</th>
                                        <th>Kuantitas Terjual</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                        <tr>
                                       
                                        <td>{{date('d F Y', strtotime($item->date))}}</td>
                                        <td>{{$item->product->name}}</td>
                                        
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>

           
        </div>
    </div>
</div>










@endsection