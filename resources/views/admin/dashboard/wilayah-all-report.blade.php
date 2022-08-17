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
    <title>Wilayah Terbanyak</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>WILAYAH TERBANYAK</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>No</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Total Pelanggan</th>
                            <th>Total Pembelian</th>


            </tr>
            @foreach ($wilayah as $item)

            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{ $item->regency_name }}</td>
                <td>{{ $item->province_name }}</td>
                <td>{{ $item->most_orders}}</td>
                <td>@currency($item->total_price)</td>
            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>