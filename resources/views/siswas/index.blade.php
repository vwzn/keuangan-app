@extends('layout')

@section('content')
    <h1>Siswas</h1>
    <a href="{{ route('siswas.create') }}">Create New Siswa</a>
    <table>
        <tr>           
            <th>No</th>
            <th>Name</th>
            <th>Saldo</th>
        </tr>
        @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ 'Rp. ' . number_format($siswa->saldo, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('siswas.show', $siswa->id) }}">Show</a>
                    <a href="{{ route('siswas.edit', $siswa->id) }}">Edit</a>
                    <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
