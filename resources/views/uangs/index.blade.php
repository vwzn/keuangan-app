@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Daftar Uang</h1>
    <a href="{{ route('uangs.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Data Uang</a>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemasukan</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengeluaran</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($uangs as $uang)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $uang->tanggal }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $uang->siswa->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">IDR {{ number_format($uang->pemasukan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">IDR {{ number_format($uang->pengeluaran, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('uangs.show', $uang->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Detail</a>
                            <a href="{{ route('uangs.edit', $uang->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 ml-2">Edit</a>
                            <form action="{{ route('uangs.destroy', $uang->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus data uang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
