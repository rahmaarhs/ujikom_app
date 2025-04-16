@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Monitoring Transaksi Pembayaran</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>No Kontrol</th>
                    <th>Bulan / Tahun</th>
                    <th>Jumlah Pakai (kWh)</th>
                    <th>Total Bayar (Rp)</th>
                    <th>Tanggal Bayar</th>
                    <th>Petugas</th>
                    <th>Aksi</th> {{-- Tombol Cetak --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($pembayarans as $key => $pembayaran)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pembayaran->pemakaian->no_kontrol }}</td>
                        <td>{{ $pembayaran->pemakaian->bulan }}/{{ $pembayaran->pemakaian->tahun }}</td>
                        <td>{{ $pembayaran->pemakaian->jumlah_pakai }}</td>
                        <td>Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}</td>
                        <td>{{ $pembayaran->petugas->nama_petugas ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.pembayaran.cetak', $pembayaran->id) }}" class="btn btn-sm btn-success" target="_blank">
                                Cetak Struk
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada transaksi pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
