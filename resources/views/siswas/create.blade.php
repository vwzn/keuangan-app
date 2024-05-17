@extends('layout')

@section('content')
<h1>Create Siswa</h1>
<form action="{{ route('siswas.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror
    
    <button type="submit">Create</button>
</form>
@endsection



