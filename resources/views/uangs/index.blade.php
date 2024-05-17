@extends('layout')

@section('content')
    <h1>Daftar Uang</h1>
    <a href="{{ route('uangs.create') }}" class="btn btn-primary">Tambah Data Uang</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No</th>
                <th>Siswa</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uangs as $uang)
                <tr>
                    <td>{{ $uang->tanggal }}</td>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uang->siswa->name }}</td>
                    
                    <td>{{ 'IDR ' . number_format($uang->pemasukan, 0, ',', '.') }}</td>
                    <td>{{ 'IDR ' . number_format($uang->pengeluaran, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('uangs.show', $uang->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('uangs.edit', $uang->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('uangs.destroy', $uang->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data uang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
