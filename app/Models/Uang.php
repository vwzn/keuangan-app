<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pemasukan',
        'pengeluaran',
        'siswa_id',
        'tanggal',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk menangani pembuatan Uang baru
        static::created(function ($uang) {
            // Perbarui saldo siswa
            $uang->updateSaldoSiswa();
        });

        // Event listener untuk menangani pembaruan Uang
        static::updated(function ($uang) {
            // Perbarui saldo siswa
            $uang->updateSaldoSiswa();
        });

        // Event listener untuk menangani penghapusan Uang
        static::deleted(function ($uang) {
            // Perbarui saldo siswa
            $uang->updateSaldoSiswa();
        });
    }

    // Metode untuk memperbarui saldo siswa
    public function updateSaldoSiswa()
    {
        // Ambil objek siswa yang terkait dengan Uang ini
        $siswa = $this->siswa;

        // Hitung total pemasukan dan pengeluaran dari Uang yang terkait dengan siswa
        $totalPemasukan = $siswa->uangs()->sum('pemasukan');
        $totalPengeluaran = $siswa->uangs()->sum('pengeluaran');

        // Hitung saldo baru
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Update saldo siswa
        $siswa->update(['saldo' => $saldo]);
    }

    // Relasi Uang dengan Siswa
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }
}