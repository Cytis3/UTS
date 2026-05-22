<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    public function definition(): array
    {
        // Menggunakan Faker untuk meng-generate data pelanggan secara acak dan dinamis
        return [
            // Membuat kode unik, contoh: CUST-4829, CUST-1093
            'kode_pelanggan' => 'CUST-' . fake()->unique()->randomNumber(4, true),

            // Nama orang acak
            'nama_pelanggan' => fake()->name(),

            // Nomor telepon acak
            'no_telepon'     => fake()->phoneNumber(),

            // Memilih tipe pelanggan secara acak dari 3 pilihan ini
            'tipe_pelanggan' => fake()->randomElement(['reguler', 'member', 'vip']),

            // Default status aktif (bisa juga diacak jika mau)
            'status'         => 'aktif',
        ];
    }
}
