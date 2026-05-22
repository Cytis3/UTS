{{-- resources/views/partials/sidebar.blade.php --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- Menggunakan icon alat makan untuk restoran --}}
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RestoApp</div>
    </a>

    <hr class="sidebar-divider my-0">

    {{-- Menu: Dashboard
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Data Master</div>

    {{-- Menu: Pelanggan
    <li class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pelanggan</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Operasional Restoran</div>

    {{-- Menu: Pesanan (Struk/Nomor Meja)
    <li class="nav-item {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pesanan.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Daftar Pesanan</span>
        </a>
    </li> --}}

    {{-- Menu: Transaksi (Detail Item Menu)
    <li class="nav-item {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('transaksi.index') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Detail Transaksi</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
