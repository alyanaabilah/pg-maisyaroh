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
    <title>Transaksi Pelanggan Pertanggal</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN KEUANGAN</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Tanggal</th>
                            <th>Total Pendapatan</th>
                            <th>Kuantitas Terjual</th>
           


            </tr>
            @foreach ($orders as $order)

            <tr>


                <td>{{date('d F Y', strtotime($order->date))}}</td>
                            <td>@currency($order->price)</td>
                            <td>{{$order->quantity}}</td>
                
                


            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>