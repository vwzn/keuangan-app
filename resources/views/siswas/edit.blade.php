@extends('layout')

@section('content')
<h1>Edit Siswa</h1>
<form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $siswa->name) }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    
    <button type="submit">Update</button>
</form>
@endsection