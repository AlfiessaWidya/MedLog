<h3><center>Laporan Data Obat</center></h3>
<table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
    <head>
        <tr>
            <th>Jumlah/Pack</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
        </tr>
    </head>
    <body>
        @foreach ($obat as $st)
            <tr>
                <td>{{$st->jumlah_obat}}</td>
                <td>{{$st->nama_obat}}</td>
                <td>{{$st->jenis_obat}}</td>
            </tr>
    @endforeach
</table>