<style>
    table td, th {
        padding: 0.5rem;
    }
</style>

<h3>KLINIK AL MUBAROK</h3>

<table border="1px solid" style="border-collapse: collapse">
    @foreach ($biaya as $item)
    <tr>
        <th>Nama Biaya</th>
        <th style="width:7rem">Harga</th>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Administrasi
        </td>
        <td>{{ $item->adm }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Obat
        </td>
        <td>{{ $item->obat }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Tuslah
        </td>
        <td>{{ $item->tuslah }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Jasa Dokter
        </td>
        <td>{{ $item->jasa_dokter }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Injeksi
        </td>
        <td>{{ $item->injeksi }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Jasa Tindakan
        </td>
        <td>{{ $item->jasa_tindakan }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            BAHP
        </td>
        <td>{{ $item->bahp }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Laboratorium
        </td>
        <td>{{ $item->lab }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Pasang Infus
        </td>
        <td>{{ $item->pasang_infus }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Cairan Infus
        </td>
        <td>{{ $item->cairan_infus }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Akomodasi
        </td>
        <td>{{ $item->akomodasi }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Jasa Perawat
        </td>
        <td>{{ $item->jasa_perawat }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            DIIT
        </td>
        <td>{{ $item->diit }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Lain-lain
        </td>
        <td>{{ $item->lain_lain }}</td>
    </tr>
    <tr>
        <td align="left" style="width:15rem">
            Pembulat
        </td>
        <td>{{ $item->pembulat }}</td>
    </tr>
    @endforeach
</table>

<script>
    window.print();
</script>