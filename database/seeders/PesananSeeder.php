<?php
// database/seeders/PesananSeeder.php

namespace Database\Seeders;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan data pelanggan sudah ada (syarat mutlak karena foreign key)
        if (Pelanggan::query()->count('*') === 0) {
            $this->command->warn('PelangganSeeder harus dijalankan lebih dulu!');
            return;
        }

        // Buat 30 pesanan (struk) dummy menggunakan PesananFactory
        Pesanan::factory(30)->create();

        // Tambah 1 data pesanan manual untuk keperluan demo/testing
        // Kita kaitkan pesanan ini dengan pelanggan VIP statis yang dibuat di PelangganSeeder tadi
        $pelanggan = Pelanggan::query()->where('kode_pelanggan', 'VIP-001')->first();

        if ($pelanggan) {
            Pesanan::create([
                'pelanggan_id'      => $pelanggan->id,
                'no_pesanan'        => 'ORD-999999',
                'no_meja'           => '8',
                'tipe_pesanan'      => 'dine-in',
                'status'            => 'diproses',
                'total_harga'       => 150000,
                'metode_pembayaran' => 'qris',
                'catatan'           => 'Tolong masakannya jangan terlalu pedas ya.',
            ]);
        }

        $this->command->info('PesananSeeder: ' . Pesanan::query()->count('*') . ' pesanan (struk) berhasil dibuat.');
    }
}
