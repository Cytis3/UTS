<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data untuk masing-masing entitas
        $totalPelanggan = Pelanggan::count();
        $totalPesanan   = Pesanan::count();
        $totalTransaksi = Transaksi::count();

        // Mengambil 5 data pesanan terbaru beserta data pelanggannya
        // (Sesuai aturan: Pesanan belongsTo Pelanggan)
        $pesananTerbaru = Pesanan::with('pelanggan')
                                ->latest()
                                ->take(5)
                                ->get();

        return view('dashboard', compact(
            'totalPelanggan',
            'totalPesanan',
            'totalTransaksi',
            'pesananTerbaru'
        ));
    }
}
