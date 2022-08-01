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
        <p align="center"><b>SISA STOCK BARANG</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>Nama</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Brand</th>
                <th>Stok</th>
                <th>Update</th>


            </tr>
            @foreach ($products as $product)

            <tr>


                <td>{{ $product->name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->updated_at }}</td>

            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>