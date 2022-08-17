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
    <title>Barang Terlaris</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>BARANG TERLARIS - BRAND</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Nama</th>
                <th>Kode</th>
                <th>Merk</th>
                <th>Terjual</th>
                <th>Harga Terjual</th>
           


            </tr>
            @foreach ($brand as $item)

            <tr>


                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->product_code }}</td>
                <td>{{ $item->product->brand->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>@currency( $item->price * $item->quantity)</td>
                
                


            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>