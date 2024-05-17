@extends('layout')

@section('content')
    <h1>{{ $siswa->name }}</h1>
    <h3>{{ $siswa->updated_at }}</h3>
    <p>{{ 'Saldo:' . ' ' . 'Rp. ' . number_format($siswa->saldo, 0, ',', '.') }}</p>

    <h2>History Pemasukan dan Pengeluaran</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa->uangs as $uang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uang->tanggal }}</td>
                    <td>{{ 'Rp. ' . number_format($uang->pemasukan, 0, ',', '.') }}</td>
                    <td>{{ 'Rp. ' . number_format($uang->pengeluaran, 0, ',', '.') }}</td>
                    <td>{{ $uang->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('siswas.index') }}">Back to List</a>
@endsection
