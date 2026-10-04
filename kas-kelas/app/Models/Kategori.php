<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['kode', 'nama', 'jenis'];

    // Tempatkan method relasi di DALAM class
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}