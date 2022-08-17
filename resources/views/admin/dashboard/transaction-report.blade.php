<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        table.static {
            position: relative;
            border: 1px solid black;
        }
    </style>
    <title>Transaksi Pelanggan</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>TRANSAKSI PELANGGAN</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th width="200px">No Pesanan</th>
                            <th>Pembeli</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Total Belanja</th>
                            <th>Tanggal<br>Membeli</th>
           


            </tr>
            @foreach ($orders as $order)

            <tr>


                <td>{{$order->order->order_no}}</td>
                            <td>{{ $order->order->user->name }}</td>
                            <td>{{ $order->order->phone_number}}</td>
                            <td>@if($order->order->order_status == '0')
                                Proses
                                @else
                                Sukses
                                @endif
                            </td>
                            <td>@currency($order->price * $order->quantity)</td>
                            <td>{{$order->created_at}}</td>
                
                


            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>