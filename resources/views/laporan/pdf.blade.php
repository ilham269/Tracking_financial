<h3>Laporan Bulanan</h3>
<p>Bulan: {{ $bulan }} / {{ $tahun }}</p>

<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tr>
        <th>Tanggal</th>
        <th>Jenis</th>
        <th>Nominal</th>
        <th>Keterangan</th>
    </tr>

    @foreach($data as $row)
    <tr>
        <td>{{ $row['tanggal'] }}</td>
        <td>{{ $row['jenis'] }}</td>
        <td>Rp {{ number_format($row['nominal'],0,',','.') }}</td>
        <td>{{ $row['keterangan'] }}</td>
    </tr>
    @endforeach
</table>
