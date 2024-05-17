@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit Data Uang</h1>
    <form action="{{ route('uangs.update', $uang->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="siswa_id" class="block text-sm font-medium text-gray-700">Siswa:</label>
            <select name="siswa_id" id="siswa_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $siswa->id == $uang->siswa_id ? 'selected' : '' }}>{{ $siswa->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="pemasukan" class="block text-sm font-medium text-gray-700">Pemasukan:</label>
            <input type="number" name="pemasukan" id="pemasukan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ $uang->pemasukan }}">
        </div>
        <div>
            <label for="pengeluaran" class="block text-sm font-medium text-gray-700">Pengeluaran:</label>
            <input type="number" name="pengeluaran" id="pengeluaran" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ $uang->pengeluaran }}">
        </div>
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="mt-1 block  py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ $uang->tanggal }}">
        </div>
        <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Simpan Perubahan</button>
    </form>
@endsection
