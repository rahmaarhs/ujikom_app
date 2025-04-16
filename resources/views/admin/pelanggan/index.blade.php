@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Pelanggan</h3>
    <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Kontrol</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Pelanggan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $p)
                <tr>
                    <td>{{ $p->no_kontrol }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->telepon }}</td>
                    <td>{{ $p->jenis_plg }}</td>
                    <td>
                        <a href="{{ route('admin.pelanggan.edit', $p->no_kontrol) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.pelanggan.destroy', $p->no_kontrol) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
