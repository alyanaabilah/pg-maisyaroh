@extends('layouts.user')

@section('content')

@include('front.partials.breadcrumb')

<section class="shoping-cart spad">

    <div class="container">
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
                                    {{ $order->tracking_no }}
                                </td>
                                <td>
                                    @currency($order->total_price)
                                </td>
                                <td>
                                    {{ $order->payment_status == '0' ? 'pending' : 'completed'}}
                                </td>
                                <td>
                                    <a href="/user/my-orders/{$order->id}" class="btn btn-primary">Detail</a>
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