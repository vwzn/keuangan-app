@extends('layout')

@section('content')
    <h1>Tambah Data Uang</h1>
    <form action="{{ route('uangs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="siswa_id">Siswa:</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pemasukan">Pemasukan:</label>
            <input type="number" name="pemasukan" id="pemasukan" class="form-control">
        </div>
        <div class="form-group">
            <label for="pengeluaran">Pengeluaran:</label>
            <input type="number" name="pengeluaran" id="pengeluaran" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
