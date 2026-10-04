<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Tambahkan import ini
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory; // 2. Tambahkan use HasFactory di sini

    protected $table = 'transaksi';
    protected $fillable = ['kategori_id', 'akun_id', 'tanggal', 'jumlah', 'keterangan'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'jumlah' => 'decimal:2',
        ];
    }

    // Tambahkan method ini di dalam class Transaksi
    public function scopePadaAkun($query, $akunId)
    {
        return $query->where('akun_id', $akunId);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function akun(): BelongsTo
    {
        return $this->belongsTo(Akun::class);
    }
}