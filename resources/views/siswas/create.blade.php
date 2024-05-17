@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Create Siswa</h1>
    <form action="{{ route('siswas.store') }}" method="POST" class="space-y-4 form-group">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-1 px-4 py-2 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Create</button>
    </form>
@endsection
