<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan ini WAJIB diikuti karena adanya foreign key:
        // 1. Pelanggan dulu (tidak bergantung pada tabel lain)
        // 2. Pesanan (bergantung pada pelanggans)
        // 3. Transaksi / Detail Item (bergantung pada pesanans)
        $this->call([
            PelangganSeeder::class,
            PesananSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}
