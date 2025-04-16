@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Petugas</h3>
    <form action="{{ route('petugas.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('petugas.index') }}" class="btn btn-secondary mt-3">Kembali</a>    
</div>
@endsection
