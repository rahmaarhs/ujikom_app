@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Tarif</h2>
    <a href="{{ route('tarif.create') }}" class="btn btn-primary mb-3">+ Tambah Tarif</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis Pelanggan</th>
                <th>Daya</th>
                <th>Tarif per kWh</th>
                <th>Biaya Beban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarif as $item)
                <tr>
                    <td>{{ $item->jenis_plg }}</td>
                    <td>{{ $item->daya }}</td>
                    <td>{{ $item->tarif_kwh }}</td>
                    <td>{{ $item->biaya_beban }}</td>
                    <td>
                        <a href="{{ route('tarif.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tarif.destroy', $item->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
