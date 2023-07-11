<!DOCTYPE html>
<html>

<head>
	<title>Struk Biaya | Klinik Al Mubarok</title>
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
			@foreach ($biaya as $item)
				<tr>
					<td valign="top">Administrasi</td>
					<td valign="top" align="right">{{ $item->adm }}</td>
					</td>
				</tr>
                <tr>
                    <td>Obat</td>
                    <td valign="top" align="right">{{ $item->obat }}</td>
                </tr>
                <tr>
                    <td>Tuslah</td>
                    <td>{{ $item->tuslah }}</td>
                </tr>
                <tr>
                    <td>Jasa Dokter</td>
                    <td>{{ $item->jasa_dokter }}</td>
                </tr>
                <tr>
                    <td>Injeksi</td>
                    <td>{{ $item->injeksi }}</td>
                </tr>
                <tr>
                    <td>Jasa Tindakan</td>
                    <td>{{ $item->jasa_tindakan }}</td>
                </tr>
                <tr>
                    <td>BAHP</td>
                    <td>{{ $item->bahp }}</td>
                </tr>
                <tr>
                    <td>Laboratorium</td>
                    <td>{{ $item->lab }}</td>
                </tr>
                <tr>
                    <td>Pasang Infus</td>
                    <td>{{ $item->pasang_infus }}</td>
                </tr>
                <tr>
                    <td>Cairan Infus</td>
                    <td>{{ $item->cairan_infus }}</td>
                </tr>
                <tr>
                    <td>Akomodasi</td>
                    <td>{{ $item->akomodasi }}</td>
                </tr>
                <tr>
                    <td>Jasa Perawat</td>
                    <td>{{ $item->jasa_perawat }}</td>
                </tr>
                <tr>
                    <td>DIIT</td>
                    <td>{{ $item->diit }}</td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td>{{ $item->lain_lain }}</td>
                </tr>
                <tr>
                    <td>Pembulat</td>
                    <td>{{ $item->pembulat }}</td>
                </tr>
            @endforeach
			<tr>
				<td colspan="4">
					<hr>
				</td>
			</tr>
			<tr>
				<td align="right" colspan="1">Total</td>
				<td align="right">Rp. {{ $total }}</td>
			</tr>
		</table>
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<th>Terimakasih, hati-hati di jalan.</th>
			</tr>
		</table>
	</div>
</body>

</html>