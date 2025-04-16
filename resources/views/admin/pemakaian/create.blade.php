@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Input Data Pemakaian</h3>
    <form action="{{ route('admin.pemakaian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Kontrol</label>
            <select name="no_kontrol" class="form-control" required>
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->no_kontrol }}">{{ $p->no_kontrol }} - {{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Bulan</label>
            <input type="text" name="bulan" class="form-control" pattern="^(0[1-9]|1[0-2])$" maxlength="2" required
                title="Masukkan bulan dalam format 01 hingga 12">
        </div>
        <div class="mb-3">
            <label>Meter Awal</label>
            <input type="number" name="meter_awal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Meter Akhir</label>
            <input type="number" name="meter_akhir" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pemakaian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
