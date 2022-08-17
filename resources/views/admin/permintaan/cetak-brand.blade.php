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
    <title>Pesanan Barang</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>PERMINTAAN PESANAN BARANG</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th width = "50px">No</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Sales</th>
                            <th>Jumlah</th>


            </tr>
            @foreach ($brands as $item)

            <tr>


                <td>{{$loop->iteration}}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->category->name }}</td>
                            <td>{{ $item->brand->name }}</td>
                            <td>{{ $item->brand->sales }}</td>
                            <td>{{ $item->kebutuhan }}</td>


            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>