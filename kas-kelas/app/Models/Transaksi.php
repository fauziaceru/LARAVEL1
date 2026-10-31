<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory; 

    protected $table = 'transaksi';
    protected $fillable = ['kategori_id', 'akun_id', 'tanggal', 'jumlah', 'keterangan'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'jumlah' => 'decimal:2',
        ];
    }

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