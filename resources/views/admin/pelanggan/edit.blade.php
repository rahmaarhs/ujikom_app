@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Pelanggan</h3>
    <form action="{{ route('admin.pelanggan.update', $pelanggan->no_kontrol) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $pelanggan->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ $pelanggan->telepon }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Pelanggan</label>
            <select name="jenis_plg" class="form-control" required>
                @foreach ($tarifs as $tarif)
                    <option value="{{ $tarif->jenis_plg }}" {{ $pelanggan->jenis_plg == $tarif->jenis_plg ? 'selected' : '' }}>
                        {{ $tarif->jenis_plg }} - {{ $tarif->daya }} VA
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
