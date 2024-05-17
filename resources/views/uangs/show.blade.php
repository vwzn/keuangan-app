@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Detail Data Uang</h1>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Uang Details</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $uang->id }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Siswa</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $uang->siswa->name }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Pemasukan</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ 'IDR ' . number_format($uang->pemasukan, 0, ',', '.') }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Pengeluaran</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ 'IDR ' . number_format($uang->pengeluaran, 0, ',', '.') }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Tanggal</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $uang->tanggal }}</dd>
                </div>
            </dl>
        </div>
    </div>
    <a href="{{ route('uangs.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Kembali</a>
@endsection
