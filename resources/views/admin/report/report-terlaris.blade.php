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
    <title>Produk Terlaris</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>PRODUK TERLARIS PERTANGGAL</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Produk</th>
                <th>Merk</th>
                <th>Kategori</th>
                <th>Kuantitas</th>
                <th>Total Harga</th>
                <th>Tanggal</th>



            </tr>
            @foreach ($tanggal as $order)

            <tr>


                <td>{{ $order->product->name }}</td>
                <td>{{ $order->product->brand->name }}</td>
                <td>{{ $order->product->category->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>@currency( $order->price * $order->quantity)</td>
                <td>{{$order->created_at}}</td>

            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>