@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Siswa</h1>
    <form action="{{ route('siswas.update', $siswa->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input id="name" name="name" type="text" value="{{ old('name', $siswa->name) }}" class="mt-1 px-4 py-2 block w-full rounded-md form-control ">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Update</button>
    </form>
@endsection
