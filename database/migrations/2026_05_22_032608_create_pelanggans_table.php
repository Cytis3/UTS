<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            // Kode unik pelanggan (sebagai pengganti kode_prodi)
            $table->string('kode_pelanggan', 15)->unique();

            // Nama pelanggan
            $table->string('nama_pelanggan', 100);

            // Nomor telepon untuk kontak (tambahan yang umum di restoran)
            $table->string('no_telepon', 20)->nullable();

            // Tipe pelanggan (sebagai pengganti jenjang pendidikan)
            $table->enum('tipe_pelanggan', ['reguler', 'member', 'vip'])->default('reguler');

            // Status keaktifan pelanggan (member)
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
