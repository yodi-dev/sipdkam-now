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
                    <td valign="top" align="right">{{ $item->tuslah }}</td>
                </tr>
                <tr>
                    <td>Jasa Dokter</td>
                    <td valign="top" align="right">{{ $item->jasa_dokter }}</td>
                </tr>
                <tr>
                    <td>Injeksi</td>
                    <td valign="top" align="right">{{ $item->injeksi }}</td>
                </tr>
                <tr>
                    <td>Jasa Tindakan</td>
                    <td valign="top" align="right">{{ $item->jasa_tindakan }}</td>
                </tr>
                <tr>
                    <td>BAHP</td>
                    <td valign="top" align="right">{{ $item->bahp }}</td>
                </tr>
                <tr>
                    <td>Laboratorium</td>
                    <td valign="top" align="right">{{ $item->lab }}</td>
                </tr>
                <tr>
                    <td>Pasang Infus</td>
                    <td valign="top" align="right">{{ $item->pasang_infus }}</td>
                </tr>
                <tr>
                    <td>Cairan Infus</td>
                    <td valign="top" align="right">{{ $item->cairan_infus }}</td>
                </tr>
                <tr>
                    <td>Akomodasi</td>
                    <td valign="top" align="right">{{ $item->akomodasi }}</td>
                </tr>
                <tr>
                    <td>Jasa Perawat</td>
                    <td valign="top" align="right">{{ $item->jasa_perawat }}</td>
                </tr>
                <tr>
                    <td>DIIT</td>
                    <td valign="top" align="right">{{ $item->diit }}</td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td valign="top" align="right">{{ $item->lain_lain }}</td>
                </tr>
                <tr>
                    <td>Pembulat</td>
                    <td valign="top" align="right">{{ $item->pembulat }}</td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="1">Total</td>
                    <td align="right">Rp. {{ $item->total }}</td>
                </tr>
                @endforeach
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