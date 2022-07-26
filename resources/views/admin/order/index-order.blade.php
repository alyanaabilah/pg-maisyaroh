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
            <h2>Product</h2>
        </div>
        <div class="card-body">

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

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No Lacak</th>
                        <th>Pembeli</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->tracking_no}}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->phone_number}}</td>
                        <td>@if($order->order_status == '0')
                            pending
                            @else
                            @endif
                        </td>

                        <td><a href="{{route('order.show', $order->id)}}" class="btn btn-primary">Detail</a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
</div>








@endsection