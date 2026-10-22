<div class="nav-wrap" id="navWrap">
  <div class="container">
    <nav class="navbar navbar-expand-xl glass-nav">
      <a class="navbar-brand d-flex align-items-center gap-3 m-0" href="{{ route('home') }}#beranda">
        {{-- Ganti dengan logo resmi Pemprov Jateng: <img src="assets/logo-jateng.png" alt="Logo Provinsi Jawa Tengah"> --}}
        <span class="brand-mark">P</span>
        <span class="brand-text">
          <b>PINDAH JATENG</b>
          <small>Pusat Informasi Inovasi Daerah</small>
          <small>Provinsi Jawa Tengah</small>
        </span>
      </a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Buka menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-auto mb-2 mb-xl-0">
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#profil">Profil</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Inovasi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('home') }}#inovasi-masyarakat">Inovasi Masyarakat</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#pemerintahan">Inovasi Penyelenggaraan Pemerintahan</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#krenova">KRENOVA</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#unggulan">Inovasi Unggulan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Riset</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('home') }}#riset">Periset</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#riset">Usulan Riset Inovasi</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#riset">Lembaga Riset</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#riset">Publikasi</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="#">FKRI</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">Informasi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('berita.index') }}">Berita</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#informasi">Video</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Statistik</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('home') }}#inovasi-masyarakat">Inovasi Masyarakat</a></li>
              <li><a class="dropdown-item" href="{{ route('home') }}#pemerintahan">Inovasi Pemerintahan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Peta Sebaran</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Peta Sebaran Inovasi</a></li>
              <li><a class="dropdown-item" href="#">Peta Sebaran Riset</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a></li>
        </ul>
        @guest
        <div class="dropdown">
          <button class="btn btn-login dropdown-toggle" data-bs-toggle="dropdown">Login</button>
          <ul class="dropdown-menu dropdown-menu-end" style="background:rgba(11,31,23,.92);border:1px solid rgba(255,255,255,.12);border-radius:18px;padding:.5rem;">
            <li><a class="dropdown-item text-white-50" href="{{ route('login') }}">Masuk</a></li>
            <li><a class="dropdown-item text-white-50" href="{{ url('/register') }}">Daftar akun baru</a></li>
          </ul>
        </div>
        @else
        <a class="btn btn-login" href="{{ route('dashboard') }}">Dashboard</a>
        @endguest
      </div>
    </nav>
  </div>
</div>
