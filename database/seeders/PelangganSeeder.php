<?php
// database/seeders/PelangganSeeder.php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data pelanggan statis (misal: pelanggan VIP/Member pertama di restoran)
        $pelanggans = [
            [
                'kode_pelanggan' => 'VIP-001',
                'nama_pelanggan' => 'Bapak Budi (Owner)',
                'no_telepon'     => '081234567890',
                'tipe_pelanggan' => 'vip',
                'status'         => 'aktif'
            ],
            [
                'kode_pelanggan' => 'MBR-001',
                'nama_pelanggan' => 'Siti Langganan',
                'no_telepon'     => '089876543210',
                'tipe_pelanggan' => 'member',
                'status'         => 'aktif'
            ],
        ];

        foreach ($pelanggans as $pelanggan) {
            Pelanggan::create($pelanggan);
        }

        // 2. Data pelanggan dinamis menggunakan PelangganFactory yang sudah kita buat
        // Misal kita ingin membuat 15 pelanggan tambahan secara acak
        Pelanggan::factory()->count(15)->create();

        // Menampilkan pesan sukses di terminal
        $totalData = count($pelanggans) + 15;
        $this->command->info('PelangganSeeder: ' . $totalData . ' pelanggan berhasil dibuat.');
    }
}
