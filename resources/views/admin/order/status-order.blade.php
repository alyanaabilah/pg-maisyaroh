@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0" style="color: black;">
                        Status Pesanan User
                        <a href="#back" target="_blank" class="primary-btn cart-btn float-right py-1">Kembali</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>

   <div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Status Pesanan</h5>
                    </div>
                    <div class="col-md-6">
                        <span class="float-right">
                            <label class="bg-success py-1 px-2 text-dark">Pesanan No: &nbsp; {{$order->order_no}}</label>
                        </span>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <h6  class="card-header">
                                Status Pesanan
                            </h6>
                            <div class="card-body">
                                <p style="color: black">
                                    @if($order->order_msg == NULL)
                                    Belum Ada update
                                    @else
                                    {{$order->order_msg}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <h6  class="card-header" >
                                Status Pesanan
                            </h6>
                            <div class="card-body">
                                <p style="color: black">
                                    @if($order->order_msg == NULL)
                                    Belum Ada update
                                    @else
                                    {{$order->order_msg}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border">
                            <h6  class="card-header">
                                Status Pesanan
                            </h6>
                            <div class="card-body">
                                <p style="color: black">
                                    @if($order->order_msg == NULL)
                                    Belum Ada update
                                    @else
                                    {{$order->order_msg}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5>Update Status Pesanan</h5>
                                <hr>
                                @if($order->order_status == "1")
                                {{$order->order_msg}}
                                @elseif($order->order_status == "2")
                                {{$order->order_msg}}
                                @else
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <select name="order_msg" class="custom-select" required id="">
                                            <option value="">Pilih Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Dikemas">Dikemas</option>
                                            <option value="Dikirim">Dikirim</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-info text-white"></button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5>Update Status Pesanan</h5>
                                <hr>
                                @if($order->order_status == "1")
                                {{$order->order_msg}}
                                @elseif($order->order_status == "2")
                                {{$order->order_msg}}
                                @else
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <select name="order_msg" class="custom-select" required id="">
                                            <option value="">Pilih Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Dikemas">Dikemas</option>
                                            <option value="Dikirim">Dikirim</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-info text-white"></button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
   </div>
</div>










@endsection