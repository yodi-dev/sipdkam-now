<!DOCTYPE html>
<html>

<head>
	<title>Laporan Keuangan | Klinik Al Mubarok</title>
	<style type="text/css">
		body {
			color: #a7a7a7;
            font-family: 'Courier New', Courier, monospace;
		}
	</style>
</head>

<body onload="window.print();">
	<div align="center">
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<th>Klinik Al Mubarok <br>
					Ngaglik, Ngeposari, Kec. Semanu<br>
					Gunung Kidul, DI Yogyakarta</th>
			</tr>
			<tr align="center">
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
		</table>

		<table width="500" border="0" cellpadding="3" cellspacing="0">
            <thead>
                <tr class="table-primary">
                    <th scope="col"><strong># Reguler</strong></th>
                    <th scope="col" align="right">Harian</th>
                    <th scope="col" align="right">Periode</th>
                    <th scope="col" align="right">Growth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regular as $item)
                    <tr>
                        <th scope="row" align="left">{{ ucfirst(trans($item['poli'])) }}</th>
                        <td valign="top" align="right">Rp. {{ $item['jumlah'] }}</td>
                        <td valign="top" align="right">Rp. {{ $item['perbulan'] }}</td>
                        <td valign="top" align="right">%</td>
                    </tr>
                @endforeach
                <tr class="table-primary">
                    <th scope="row" align="right">Total</th>
                    <td valign="top" align="right">Rp. {{ $jumlah_perhari->total_perhari }}</td>
                    <td valign="top" align="right">Rp. {{ $jumlah_perbulan->total_perbulan }}</td>
                    <td valign="top" align="right">2%</td>
                </tr>
            </tbody>
		</table>

		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
		</table>

        <table width="500" border="0" cellpadding="1" cellspacing="0">
            <thead>
                <tr class="table-primary">
                    <th scope="col"><strong># BPJS</strong></th>
                    <th scope="col" align="right">Harian</th>
                    <th scope="col" align="right">Periode</th>
                    <th scope="col" align="right">Growth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bpjs as $item)
                    <tr>
                        <th scope="row" align="left">{{ ucfirst(trans($item['poli'])) }}</th>
                        <td valign="top" align="right">Rp. {{ $item['jumlah'] }}</td>
                        <td valign="top" align="right">Rp. {{ $item['perbulan'] }}</td>
                        <td valign="top" align="right">%</td>
                    </tr>
                @endforeach
                <tr class="table-primary">
                    <th scope="row">Total</th>
                    <td valign="top" align="right">Rp. {{ $jumlah_perhari_bpjs->total_perhari }}</td>
                    <td valign="top" align="right">Rp. {{ $jumlah_perbulan_bpjs->total_perbulan }}</td>
                    <td valign="top" align="right">2%</td>
                </tr>
            </tbody>
        </table>
	</div>
</body>

</html>