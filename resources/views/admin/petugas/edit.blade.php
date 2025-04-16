@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Petugas</h3>
    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $petugas->name }}">
        <input type="email" name="email" value="{{ $petugas->email }}">
        <button type="submit">Update</button>
    </form>    
</div>
@endsection
