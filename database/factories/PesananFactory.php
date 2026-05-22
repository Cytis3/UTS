<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    public function definition(): array
    {
        // Ambil pelanggan_id secara acak dari data pelanggan yang sudah ada di database
        $pelangganId = Pelanggan::query()->inRandomOrder('')->value('id');

        // Tentukan tipe pesanan terlebih dahulu agar bisa mengatur logika nomor meja
        $tipePesanan = fake()->randomElement(['dine-in', 'takeaway', 'delivery']);

        return [
            'pelanggan_id'      => $pelangganId,

            // Membuat nomor pesanan unik, contoh: ORD-849201
            'no_pesanan'        => 'ORD-' . fake()->unique()->numerify('######'),

            // Jika dine-in berikan nomor meja acak (1-50), jika tidak maka kosongkan (null)
            'no_meja'           => $tipePesanan === 'dine-in' ? fake()->numberBetween(1, 50) : null,

            'tipe_pesanan'      => $tipePesanan,

            // Mengacak status pesanan. 'selesai' diperbanyak agar data riwayatnya terlihat realistis
            'status'            => fake()->randomElement([
                'selesai', 'selesai', 'selesai', 'diproses', 'pending', 'batal'
            ]),

            // Menghasilkan total harga acak kelipatan ribuan (contoh: 45000, 120000)
            'total_harga'       => fake()->numberBetween(5, 100) * 5000,

            // Mengacak metode pembayaran
            'metode_pembayaran' => fake()->randomElement(['cash', 'qris', 'transfer', 'kartu kredit']),

            // Menghasilkan catatan acak (optional() berarti kadang akan bernilai null)
            'catatan'           => fake()->optional()->sentence(),
        ];
    }
}
