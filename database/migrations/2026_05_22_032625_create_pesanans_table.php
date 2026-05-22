<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel pelanggans (Sesuai aturan: Pesanan belongsTo Pelanggan)
            $table->foreignId('pelanggan_id')
                  ->constrained('pelanggans')      // referensi ke tabel pelanggans
                  ->onDelete('restrict');        // cegah hapus pelanggan jika masih memiliki riwayat pesanan

            // Nomor pesanan atau struk (sebagai pengganti NIM)
            $table->string('no_pesanan', 20)->unique();

            // Nomor meja untuk pelanggan dine-in
            $table->string('no_meja', 10)->nullable();

            // Tipe pesanan
            $table->enum('tipe_pesanan', ['dine-in', 'takeaway', 'delivery'])->default('dine-in');

            // Status pesanan (disesuaikan dengan logika dashboard sebelumnya)
            $table->enum('status', ['pending', 'diproses', 'selesai', 'batal'])
                  ->default('pending');

            // Total harga untuk 1 nomor pesanan ini
            $table->decimal('total_harga', 15, 2)->default(0);

            // Metode pembayaran (cash, qris, transfer, dll)
            $table->string('metode_pembayaran', 50)->nullable();

            // Catatan khusus pesanan (sebagai pengganti alamat)
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
