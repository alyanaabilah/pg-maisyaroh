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
    <title>Cetak kendaraan</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Cetak kendaraan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>

                <th>No</th>
                            <th>Nomor Polisi</th>
                            <th>Merk Kendaraan</th>
                            <th>Transmisi</th>
                            <th>Tahun Pembuatan</th>
                            


            </tr>
            @foreach ($kendaraan as $item)

                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{ $item->nomor_polisi }}</td>
                            <td>{{ $item->merk_kendaraan }}</td>
                            <td>{{ $item->transmisi }}</td>
                            <td>{{ $item->tahun_pembuatan }}</td>
            </tr>

            @endforeach
        </table>
    </div>
</body>

</html>