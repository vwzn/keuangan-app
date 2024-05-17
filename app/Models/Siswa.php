<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pemasukan',
        'pengeluaran',
        'saldo',

    ];

    public function uangs()
    {
        return $this->hasMany(Uang::class);
    }
}
