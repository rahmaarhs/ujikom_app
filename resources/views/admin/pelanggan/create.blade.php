@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pelanggan</h3>
    <form action="{{ route('admin.pelanggan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Kontrol</label>
            <input type="text" name="no_kontrol" class="form-control" value="{{ str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT) }}" maxlength="12" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input 
                type="text" 
                name="telepon" 
                id="telepon" 
                class="form-control" 
                pattern="^08[0-9]{8,10}$" 
                inputmode="numeric"
                maxlength="12"
                required
                title="Nomor telepon harus dimulai dengan '08' dan memiliki panjang 10-12 digit angka">
        </div>        
        <div class="mb-3">
            <label>Jenis Pelanggan</label>
            <select name="jenis_plg" class="form-control" required>
                @foreach ($tarifs as $tarif)
                    <option value="{{ $tarif->jenis_plg }}">{{ $tarif->jenis_plg }} -> {{ $tarif->daya }} VA</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
