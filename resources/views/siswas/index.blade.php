@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Siswas</h1>
    <a href="{{ route('siswas.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Create New Siswa</a>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($siswas as $siswa)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp. {{ number_format($siswa->saldo, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('siswas.show', $siswa->id) }}" class="text-blue-600 hover:text-blue-700">Show</a>
                            <a href="{{ route('siswas.edit', $siswa->id) }}" class="text-blue-600 hover:text-blue-700 ml-2">Edit</a>
                            <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data uang ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
