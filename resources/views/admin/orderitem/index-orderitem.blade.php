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
                        <th width="150px">Pembeli</th>
                        <th width="280px">Product</th>
                        <th width="100px">Quantity</th>
                        <th width="150px">Harga</th>
                        <th>Gambar</th>
                        <th>Tanggal Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderitems as $item)
                    <tr>
                        <td>{{$item->order->name}}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity}}</td>
                        <td>@currency($item->price)</td>
                        <td>
                            <img src="{{asset('storage/'. $item->product->image)}}" width="100px">
                        </td>
                        <td>{{$item->created_at}}</td>
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