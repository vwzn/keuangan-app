<?php

namespace App\Http\Controllers;

use App\Models\Uang;
use App\Models\Siswa;
use Illuminate\Http\Request;

class UangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilkan semua data uang
        $uangs = Uang::all();
        return view('uangs.index', compact('uangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk menambahkan data uang
        $siswas = Siswa::all();
        return view('uangs.create', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'siswa_id' => 'required',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'tanggal' => 'required|date',
        ]);

        // Simpan data uang ke database
        $uang = Uang::create($request->all());

        // Perbarui saldo siswa
        $this->updateSaldoSiswa($uang);

        return redirect()->route('uangs.index')->with('success', 'Data uang berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uang $uang)
    {
        // Validasi data yang diinput
        $request->validate([
            'siswa_id' => 'required',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'tanggal' => 'required|date',
        ]);

        // Update data uang di database
        $uang->update($request->all());

        // Perbarui saldo siswa
        $this->updateSaldoSiswa($uang);

        return redirect()->route('uangs.index')->with('success', 'Data uang berhasil diperbarui.');
    }

    /**
     * Update saldo siswa based on the provided uang.
     */
    private function updateSaldoSiswa(Uang $uang)
    {
        $siswa = Siswa::find($uang->siswa_id);
        
        // Hitung total pemasukan dan pengeluaran siswa
        $totalPemasukan = $siswa->uangs()->sum('pemasukan');
        $totalPengeluaran = $siswa->uangs()->sum('pengeluaran');
        
        // Hitung saldo baru
        $saldo = $totalPemasukan - $totalPengeluaran;
        
        // Update saldo siswa
        $siswa->update(['saldo' => $saldo]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Uang $uang)
    {
        // Tampilkan detail data uang
        return view('uangs.show', compact('uang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uang $uang)
    {
        // Tampilkan form untuk mengedit data uang
        $siswas = Siswa::all();
        return view('uangs.edit', compact('uang', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uang $uang)
    {
        // Hapus data uang dari database
        $uang->delete();

        return redirect()->route('uangs.index')->with('success', 'Data uang berhasil dihapus.');
    }
}
