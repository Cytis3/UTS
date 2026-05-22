<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    // Sesuaikan dengan kolom yang ada di migration pelanggans
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'no_telepon',
        'tipe_pelanggan',
        'status',
    ];

    // ===== RELASI =====

    /**
     * Satu Pelanggan bisa melakukan BANYAK Pesanan (Struk)
     * Relasi: hasMany
     */
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}
