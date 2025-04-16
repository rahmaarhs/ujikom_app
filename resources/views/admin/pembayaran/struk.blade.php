<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header, .footer { text-align: center; margin-bottom: 10px; }
        table { width: 100%; }
        th, td { padding: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PLN - Struk Pembayaran</h2>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}</p>
        <hr>
    </div>

    <table>
        <tr>
            <td><strong>No Kontrol</strong></td>
            <td>: {{ $pembayaran->pemakaian->no_kontrol }}</td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{ $pembayaran->pemakaian->pelanggan->nama }}</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>: {{ $pembayaran->pemakaian->pelanggan->alamat }}</td>
        </tr>
        <tr>
            <td><strong>Bulan / Tahun</strong></td>
            <td>: {{ $pembayaran->pemakaian->bulan }} / {{ $pembayaran->pemakaian->tahun }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Pakai</strong></td>
            <td>: {{ $pembayaran->pemakaian->jumlah_pakai }} kWh</td>
        </tr>
        <tr>
            <td><strong>Biaya Beban</strong></td>
            <td>: Rp {{ number_format($pembayaran->pemakaian->biaya_beban_pemakai, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Biaya Pemakaian</strong></td>
            <td>: Rp {{ number_format($pembayaran->pemakaian->biaya_pemakaian, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Total Bayar</strong></td>
            <td>: <strong>Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}</strong></td>
        </tr>
        <tr>
            <td><strong>Dibayar Oleh</strong></td>
            <td>: {{ $pembayaran->petugas->nama_petugas ?? '-' }}</td>
        </tr>
    </table>

    <div class="footer">
        <hr>
        <p>Terima kasih telah membayar tepat waktu!</p>
    </div>
</body>
</html>
