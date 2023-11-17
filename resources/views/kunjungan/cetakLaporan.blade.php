<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kunjungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .table th td {
            border: 1px solid;  border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h4 class="card-title">{{ format_tanggal(now()) }}</h4>
    <br>
    <br>
    <table class="table table-hover mb-5">
        <thead>
            <tr class="table-primary">
                <th scope="col"><strong># Reguler</strong></th>
                <th scope="col">Harian</th>
                <th scope="col">Periode</th>
                <th scope="col">Growth</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regular as $item)
                <tr>
                    <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['perbulan'] }}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr class="table-primary">
                <th scope="row">Total</th>
                <td >{{ $jumlah_perhari->jumlah }}</td>
                <td>{{ $jumlah_perbulan->jumlah }}</td>
                <td>4%</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
            <th scope="col"><strong># BPJS</strong></th>
            <th scope="col">Harian</th>
            <th scope="col">Periode</th>
            <th scope="col">Growth</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bpjs as $item)
                <tr>
                    <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['perbulan'] }}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr class="table-primary">
                <th scope="row">Total</th>
                <td >{{ $jumlah_perhari_bpjs->jumlah }}</td>
                <td>{{ $jumlah_perbulan_bpjs->jumlah }}</td>
                <td>4%</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

