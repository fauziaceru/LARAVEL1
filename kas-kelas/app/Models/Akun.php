<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Akun extends Model
{
    use HasFactory; 

    protected $table = 'akun';
    protected $fillable = ['kode', 'nama', 'saldo_awal'];

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}