@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Data Petugas Loket</h3>
    <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">Tambah Petugas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($petugas as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus petugas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data petugas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
