@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Pemakaian</h3>
    <a href="{{ route('admin.pemakaian.create') }}" class="btn btn-success mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Kontrol</th>
                <th>Nama</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Jumlah Pakai</th>
                <th>Biaya Beban</th>
                <th>Biaya Pemakaian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->no_kontrol }}</td>
                <td>{{ $p->pelanggan->nama ?? '-' }}</td>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->bulan }}</td>
                <td>{{ $p->meter_awal }}</td>
                <td>{{ $p->meter_akhir }}</td>
                <td>{{ $p->jumlah_pakai }}</td>
                <td>{{ $p->biaya_beban_pemakai }}</td>
                <td>{{ $p->biaya_pemakaian }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
