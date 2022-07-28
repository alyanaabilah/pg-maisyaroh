<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pangkalan Gas Maisyaroh</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h3 class="text-white">Pangkalan Gas Maisyaroh</h3>
                </div>
                <div class="">
                    <div class="company-details">
                        <p class="text-white">Sungai Sipai</p>
                        <p class="text-white">Kota Martapura</p>
                        <p class="text-white">087838797675</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="">
                <div class="">
                    <h2 class="heading">Invoice No.: {{ $order->id }}</h2>
                    <p class="sub-heading">Tracking No. {{ $order->tracking_no }} </p>
                    <p class="sub-heading">Order Date: {{ $order->created_at->format('d-m-Y') }} </p>
                    <p class="sub-heading">Email Address: customer@gfmail.com </p>
                </div>
                <div class="">
                    <p class="sub-heading">Full Name: {{$order->name}}</p>
                    <p class="sub-heading">Address: {{$order->addres}}</p>
                    <p class="sub-heading">Phone Number: {{$order->phone_number}}</p>
                    <p class="sub-heading">City,State,Pincode: {{$order->provinces->name}}, {{$order->regencies->name}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($order->orderitem as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>@currency($item->price)</td>
                        <td>{{$item->ptice * $item->quantity}}</td>
                    </tr>

                    <tr>
                        <td colspan="3" class="text-right">Ongkos Kirim</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Total</td>
                        <td>@currency($item->total_price)</td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status:
                @if($order->payment_status == '0')
                Pending
                @elseif($order->payment_status == '1')
                COD - Terbayar
                @elseif($order->payment_status == '2')
                Transfer Bank - Sukses
                @elseif($order->payment_status == '3')
                Transfer Bank - Pending
                @endif
            </h3>
            <h3 class="heading">Payment Mode: {{ $order->payment_mode }}</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Fabcart. All rights reserved.
                <a href="#" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>
    </div>

</body>

</html>