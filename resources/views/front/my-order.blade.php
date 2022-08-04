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
                                <th>Nomor Tracking</th>
                                <th>Total Pembelian</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                                <th></th>
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
                                <td>
                                    {{ $order->order_status == '0' ? 'pending' : 'completed'}}
                                </td>
                                <td>
                                    @if(Auth::user()->ceklevel === 'user')

                                    <a href="/user/my-orders/{{$order->id}}"><i class="fa fa-info-circle fa-2x mr-2" style="color:black;"></i></a>
                                    <a href=" /user/confirmation-orders/{{$order->id}}"><i class="fa fa-check-circle fa-2x" style="color:black;"></i></a>
                                    @else (Auth::user()->ceklevel === 'subsidi')
                                    <a href="/subsidi/my-orders/{{$order->id}}"><i class="fa fa-info-circle fa-2x mr-2" style="color:black;"></i></a>
                                    <a href="/subsidi/confirmation-orders/{{$order->id}}"><i class="fa fa-check-circle fa-2x" style="color:black;"></i></a>
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