@extends('layout')

@section('content')
    <h1>Detail Data Uang</h1>
    <p><strong>ID:</strong> {{ $uang->id }}</p>
    <p><strong>Siswa:</strong> {{ $uang->siswa->name }}</p>
    <p><strong>Pemasukan:</strong> {{ 'IDR ' . number_format($uang->pemasukan, 0, ',', '.') }}</p>
    <p><strong>Pengeluaran:</strong> {{ 'IDR ' . number_format($uang->pengeluaran, 0, ',', '.') }}</p>
    <p><strong>Tanggal:</strong> {{ $uang->tanggal }}</p>
    <a href="{{ route('uangs.index') }}" class="btn btn-primary">Kembali</a>
@endsection
