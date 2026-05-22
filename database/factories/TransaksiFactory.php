<?php

namespace Database\Factories;

use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    // Daftar menu restoran statis (menggantikan data mata kuliah)
    private static array $daftarMenu = [
        ['kode' => 'MN001', 'nama' => 'Nasi Goreng Spesial', 'kategori' => 'Makanan', 'harga' => 25000],
        ['kode' => 'MN002', 'nama' => 'Mie Goreng Seafood',  'kategori' => 'Makanan', 'harga' => 30000],
        ['kode' => 'MN003', 'nama' => 'Ayam Bakar Madu',     'kategori' => 'Makanan', 'harga' => 35000],
        ['kode' => 'MN004', 'nama' => 'Sate Ayam Madura',    'kategori' => 'Makanan', 'harga' => 28000],
        ['kode' => 'MN005', 'nama' => 'Es Teh Manis',        'kategori' => 'Minuman', 'harga' => 5000],
        ['kode' => 'MN006', 'nama' => 'Jus Jeruk Peras',     'kategori' => 'Minuman', 'harga' => 12000],
        ['kode' => 'MN007', 'nama' => 'Kopi Susu Gula Aren', 'kategori' => 'Minuman', 'harga' => 18000],
        ['kode' => 'MN008', 'nama' => 'Pudding Coklat',      'kategori' => 'Dessert', 'harga' => 15000],
    ];

    public function definition(): array
    {
        // Mengambil salah satu menu secara acak dari array di atas
        $menu   = fake()->randomElement(self::$daftarMenu);

        // Mengacak jumlah porsi yang dipesan (antara 1 sampai 5 porsi per item)
        $jumlah = fake()->numberBetween(1, 5);

        $hargaSatuan = $menu['harga'];

        return [
            // Ambil pesanan_id (struk) secara acak dari database
            'pesanan_id'    => Pesanan::query()->inRandomOrder('')->value('id'),

            'kode_menu'     => $menu['kode'],
            'nama_menu'     => $menu['nama'],
            'kategori_menu' => $menu['kategori'],
            'jumlah'        => $jumlah,
            'harga_satuan'  => $hargaSatuan,

            // Memanggil fungsi helper dari Model Transaksi untuk otomatis mengkalikan jumlah * harga
            'subtotal'      => Transaksi::hitungSubtotal($jumlah, $hargaSatuan),
        ];
    }
}
