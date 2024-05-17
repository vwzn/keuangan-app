@extends('layout')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-2">{{ $siswa->name }}</h1>
        <p class="text-gray-600 mb-4">Last updated: {{ $siswa->updated_at->format('M d, Y') }}</p>
        <p class="text-gray-800">Saldo: Rp. {{ number_format($siswa->saldo, 0, ',', '.') }}</p>

        <h2 class="mt-8 text-xl font-semibold mb-2">History Pemasukan dan Pengeluaran</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Pemasukan</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Pengeluaran</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($siswa->uangs as $uang)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $uang->tanggal }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp. {{ number_format($uang->pemasukan, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp. {{ number_format($uang->pengeluaran, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $uang->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('siswas.index') }}" class="inline-block mt-8 text-blue-600 hover:text-blue-700">Back to List</a>
    </div>
@endsection
