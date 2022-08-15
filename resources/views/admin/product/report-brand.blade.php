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
    <title>Sisa Stock Barang</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>SISA STOCK BARANG - BRAND</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Nama</th>
                <th>Kode</th>
                <th>Brand</th>
                <th>Stok</th>
                <th>Update</th>


            </tr>
            @foreach ($brands as $item)

            <tr>


                <td>{{ $item->name }}</td>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->stock }}</td>
                

            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>