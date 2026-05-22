{{-- resources/views/dashboard.blade.php --}}
@extends('layout.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

    {{-- Baris Kartu Statistik --}}
    <div class="row">

        {{-- Kartu: Total Pelanggan --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Pelanggan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPelanggan }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu: Total Pesanan --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pesanan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPesanan }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu: Total Transaksi --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Transaksi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalTransaksi }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Tabel Pesanan Terbaru --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-clipboard-list mr-2"></i>Pesanan Terbaru
            </h6>
            <a href="" class="btn btn-sm btn-primary">
                Lihat Semua
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Waktu Pesan</th>
                            <th>No. Meja</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesananTerbaru as $pesanan)
                            <tr>
                                <td>{{ $pesanan->no_pesanan }}</td>
                                {{-- Mengambil nama pelanggan dari relasi belongsTo --}}
                                <td>{{ $pesanan->pelanggan->nama_pelanggan ?? '-' }}</td>
                                <td>{{ $pesanan->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $pesanan->no_meja ?? '-' }}</td>
                                <td>
                                    {{-- Warna badge disesuaikan dengan status pesanan restoran --}}
                                    <span
                                        class="badge badge-{{ $pesanan->status === 'selesai'
                                            ? 'success'
                                            : ($pesanan->status === 'diproses'
                                                ? 'primary'
                                                : ($pesanan->status === 'pending'
                                                    ? 'warning'
                                                    : 'danger')) }}">
                                        {{ ucfirst($pesanan->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada data pesanan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
