@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Data Tarif</h2>
    <form action="{{ route('tarif.store') }}" method="POST">
        @csrf
        @include('admin.tarif.form')
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
