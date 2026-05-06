<!-- HEADER -->
<header>
    <div class="header-container">

        <div class="logo-title">
            <img src="{{ asset('logo-salon.png') }}" width="50">
            <h1>GOLDEN GLOW SALON</h1>
        </div>

        <div class="search-box">
            <input type="text" id="search" placeholder="Cari..." class="form-control mb-3">
        </div>

    </div>
</header>

<!-- SIDEBAR -->
<nav>
    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
    <a href="/booking">Booking</a>
    <a href="/layanan" class="{{ request()->is('layanan') ? 'active' : '' }}">Layanan</a>
    <a href="/laporan">Laporan Keuangan</a>
</nav>
