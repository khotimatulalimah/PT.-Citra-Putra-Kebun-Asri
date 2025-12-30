<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Riwayat Mesin</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<h3>Riwayat Mesin</h3>
<p><strong>Unit :</strong> {{ $nama_unit }}</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>HM Last Service</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($riwayat as $i => $row)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->hm_last_service }}</td>
            <td>{{ $row->nama_barang }}</td>
            <td>{{ $row->jumlah_barang }}</td>
            <td>{{ number_format($row->harga_satuan) }}</td>
            <td>{{ number_format($row->harga_total) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
