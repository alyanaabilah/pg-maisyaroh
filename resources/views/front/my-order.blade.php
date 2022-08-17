@extends('layouts.user')

@section('content')

@include('front.partials.breadcrumb')



<section class="shoping-cart spad">

    <div class="container">
        @if($orders->count() > 1)
        <div class="alert alert-danger" role="alert">
            <h3 style="text-align: center;">Silahkan lakukan Pembayaran</h3>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table ">
                    <table>
                        <thead>
                            <tr>
                                <th>Nomor Pembelian</th>
                                <th>Total Pembelian</th>
                                <th>Status Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)

                            <tr>
                                <td>
                                    {{ $order->order_no }}
                                </td>
                                <td>
                                    @currency($order->total_price)
                                </td>
                               
                                    @if($order->order_status == '0')
                                <td>Pending</td>
                                @elseif($order->order_status == '1')
                                <td>Sukses</td>
                                @elseif($order->order_status == '2')
                                <td>Cancel</td>
                                @elseif($order->order_status == '3')
                                <td>Complete</td>
                                @else
                                <td></td>
                                @endif
                                </td>
                                <td>
                                    @if(Auth::user()->ceklevel === 'user')

                                    <a href="/user/my-orders/{{$order->id}}"><i class="fa fa-info-circle fa-2x mr-2" style="color:black;"></i></a>
                                   
                                    @elseif(Auth::user()->ceklevel === 'admin')
                                    <a href="/admin/my-orders/{{$order->id}}"><i class="fa fa-info-circle fa-2x mr-2" style="color:black;"></i></a>
                                    @if ($order->order_status == "1")
                                    <a href="/subsidi/confirmation-orders/{{$order->id}}"><i class="fa fa-check-circle fa-2x" style="color:black;"></i></a>
                                    @endif
                                    @endif
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close delete-cart-item border-0"></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">

                    <a href="/user/home" class="primary-btn cart-btn">Beranda</a>

                    <a href="/user/shop" class="primary-btn cart-btn cart-btn-right">
                        Belanja</a>

                </div>
            </div>


        </div>
    </div>

</section>







@endsection