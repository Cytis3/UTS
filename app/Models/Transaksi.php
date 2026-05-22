<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    // Sesuaikan dengan kolom yang ada di migration transaksis
    protected $fillable = [
        'pesanan_id',
        'kode_menu',
        'nama_menu',
        'kategori_menu',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    // Memastikan tipe data angka di-cast dengan benar
    protected $casts = [
        'jumlah'       => 'integer',
        'harga_satuan' => 'float',
        'subtotal'     => 'float',
    ];

    // ===== RELASI =====

    /**
     * Rincian Transaksi (Item) MILIK satu Pesanan (Struk)
     * Relasi: belongsTo
     * Akses: $transaksi->pesanan->no_pesanan
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    // ===== HELPER: Hitung otomatis subtotal =====
    /**
     * Fungsi bantuan untuk mengkalkulasi subtotal berdasarkan jumlah dan harga satuan
     */
    public static function hitungSubtotal(int $jumlah, float $hargaSatuan): float
    {
        return $jumlah * $hargaSatuan;
    }
}
