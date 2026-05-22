<?php
// database/seeders/TransaksiSeeder.php

namespace Database\Seeders;

use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan data pesanan (struk) sudah ada sebelum membuat rincian item
        if (Pesanan::query()->count('*') === 0) {
            $this->command->warn('PesananSeeder harus dijalankan lebih dulu!');
            return;
        }

        // Setiap pesanan (struk) akan diisi dengan 1 hingga 5 macam item menu secara acak
        Pesanan::all()->each(function ($pesanan) {
            // Menentukan berapa banyak macam menu yang dipesan dalam 1 struk
            $jumlahMacamMenu = rand(1, 5);

            // Memanggil TransaksiFactory untuk membuat rincian item
            // dan mengikatnya secara paksa ke ID pesanan yang sedang di-looping
            Transaksi::factory($jumlahMacamMenu)->create([
                'pesanan_id' => $pesanan->id,
            ]);
        });

        // Menampilkan pesan sukses di terminal
        $this->command->info('TransaksiSeeder: ' . Transaksi::query()->count('*') . ' rincian item transaksi berhasil dibuat.');
    }
}
