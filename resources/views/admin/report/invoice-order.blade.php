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
            width: 100%;
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
                    
                            <p class="text-white">Sungai Sipai</p>
                            <p class="text-white">Kota Martapura</p>
                            <p class="text-white">087838797675</p>
                      
            </div>
        </div>

        <div class="body-section">
            <div class="">
                <div class="">
                    <h2 class="heading">Invoice No.: {{ $order->id }}</h2>
                    <p class="sub-heading">Order No. {{ $order->order_no }} </p>
                    <p class="sub-heading">Order Date: {{ $order->created_at->format('d-m-Y') }} </p>
                </div>
                <div class="">
                    <p class="sub-heading">Nama: {{$order->name}}</p>
                    <p class="sub-heading">Nomor Telepon: {{$order->phone_number}}</p>
                    <p class="sub-heading">Alamat: {{$order->addres}}</p>
                    <p class="sub-heading">Provinsi, Kota, Kodepos: {{$order->provinces->name}}, {{$order->regencies->name}}, {{$order->zip_code}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Pembelian Barang</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th class="w-20">Harga</th>
                        <th class="w-20">Kuantitas</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($order->orderitem as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>@currency($item->price)</td>
                        <td>@currency($item->price * $item->quantity)</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Ongkos Kirim</td>
                        <td>Rp.10.000</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Total</td>
                        <td>@currency($order->total_price + 10000)</td>
                    </tr>
                    
                    </tr>
                </tbody>
            </table>
            <br>
            <hr>
            <h3 class="heading">Pembayaran:
                @if($order->payment_mode == '1')
                                    COD
                                    @elseif($order->payment_mode == '2')
                                    Transfer Bank
                                    @elseif($order->payment_mode == '3')
                                    Pembayaran Ke Toko
                                    @endif
            </h3>
            <h3 class="heading">Pengiriman:
                @if($order->pengiriman == "1")
                            COD
                            @elseif($order->pengiriman == "2")
                            JNE
                            @elseif($order->pengiriman == "3")
                            Ambil Di Toko
                            @endif
            </h3>
            <h3 class="heading">Status Pembayaran:
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
            <h3 class="heading">Status Order:
                @if($order->order_status == '0')
                                    Pending
                                    @elseif($order->order_status == '1')
                                    Sukses
                                    @elseif($order->order_status == '2')
                                    Dibatalkan
                                    @elseif($order->order_status == '3')
                                    Diterima User
                                    @endif
            </h3>
           
                        
        </div>

        
    </div>

</body>

</html>