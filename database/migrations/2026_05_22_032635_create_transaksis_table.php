<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel pesanans (Sesuai aturan: Transaksi belongsTo Pesanan)
            $table->foreignId('pesanan_id')
                  ->constrained('pesanans')
                  ->onDelete('cascade'); // jika nomor pesanan dibatalkan/dihapus, rincian item ikut terhapus

            // Kode menu (sebagai pengganti kode_mk)
            $table->string('kode_menu', 20);

            // Nama menu yang dipesan (sebagai pengganti nama_mk)
            $table->string('nama_menu', 100);

            // Kategori menu (sebagai pengganti semester, misalnya: Makanan, Minuman, Dessert)
            $table->string('kategori_menu', 50)->nullable();

            // Jumlah item yang dipesan (sebagai pengganti sks)
            $table->integer('jumlah');

            // Harga satuan menu (sebagai pengganti nilai_angka)
            $table->decimal('harga_satuan', 15, 2);

            // Total harga per item (jumlah * harga_satuan) (sebagai pengganti nilai_huruf)
            $table->decimal('subtotal', 15, 2);

            // Kolom tahun_akademik dihapus karena waktu transaksi sudah ter-cover oleh timestamps()

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
