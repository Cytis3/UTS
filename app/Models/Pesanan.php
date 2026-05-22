<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    // Sesuaikan dengan kolom yang ada di migration pesanans
    protected $fillable = [
        'pelanggan_id',
        'no_pesanan',
        'no_meja',
        'tipe_pesanan',
        'status',
        'total_harga',
        'metode_pembayaran',
        'catatan',
    ];

    // ===== RELASI =====

    /**
     * Pesanan (Struk) MILIK satu Pelanggan
     * Relasi: belongsTo
     * Akses: $pesanan->pelanggan->nama_pelanggan
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    /**
     * Satu nomor Pesanan memiliki BANYAK rincian Transaksi (Item Menu)
     * Relasi: hasMany
     * Akses: $pesanan->transaksis
     */
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'pesanan_id');
    }

    // ===== HELPER METHOD =====

    /**
     * Hitung total tagihan dari penjumlahan subtotal seluruh item transaksi
     */
    public function getHitungTotalAttribute(): float
    {
        if ($this->transaksis->isEmpty()) return 0;

        // Menjumlahkan kolom 'subtotal' dari seluruh data di relasi transaksis
        return $this->transaksis->sum('subtotal');
    }
}
