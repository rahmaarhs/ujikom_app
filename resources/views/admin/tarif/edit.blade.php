@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Tarif</h2>
    <form action="{{ route('tarif.update', $tarif->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.tarif.form', ['tarif' => $tarif])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
