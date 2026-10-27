{{--
    SIDEBAR. Tiga pola menu, salin sesuai kebutuhan:

      1. MENU TUNGGAL   <li><a class="side-link"> ... </a></li>
      2. MENU BERSUB    <li> tombol collapse + <ul class="side-sub"> ... </ul> </li>
      3. MENU BERBATAS HAK AKSES   dibungkus @can('nama.permission') ... @endcan

    Status aktif: pakai request()->routeIs('nama.route*'). Untuk menu bersub, hitung $open sekali
    lalu pakai untuk: kelas "collapsed" pada tombol, aria-expanded, dan kelas "show" pada panel.
--}}
<aside class="app-sidebar" id="appSidebar" aria-label="Menu utama">

    <a href="{{ route('dashboard') }}" class="side-brand">
        {{-- Ganti dengan logo resmi: <img src="{{ asset('assets/img/logo.png') }}" alt="" height="38"> --}}
        <span class="side-brand-mark"><i class="bi bi-lightbulb-fill"></i></span>
        <span class="side-brand-text">
            <strong>PINDAH</strong>
            <small>Jawa Tengah</small>
        </span>
    </a>

    <nav class="side-nav">

        <div class="side-label">Menu Utama</div>
        <ul class="side-menu">

            {{-- 1. MENU TUNGGAL --}}
            <li>
                <a class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a class="side-link {{ request()->routeIs('contoh.kosong') ? 'active' : '' }}" href="{{ route('contoh.kosong') }}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Halaman Kosong</span>
                    <b class="side-badge">Baru</b>
                </a>
            </li>

            {{-- 2. MENU BERSUB --}}
            @php($openMaster = request()->routeIs('contoh.tabel', 'admin.berita.*', 'admin.hero.*', 'admin.video.*'))
            <li>
                <a class="side-link {{ $openMaster ? '' : 'collapsed' }}" href="#menuMaster"
                   data-bs-toggle="collapse" role="button"
                   aria-expanded="{{ $openMaster ? 'true' : 'false' }}" aria-controls="menuMaster">
                    <i class="bi bi-database"></i>
                    <span>Data Master</span>
                    <i class="bi bi-chevron-down side-caret"></i>
                </a>
                <div class="collapse {{ $openMaster ? 'show' : '' }}" id="menuMaster">
                    <ul class="side-sub">
                        <li><a class="{{ request()->routeIs('contoh.tabel') ? 'active' : '' }}" href="{{ route('contoh.tabel') }}">Contoh Tabel</a></li>
                        @role('super-admin')
                            <li><a class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">Berita</a></li>
                            <li><a class="{{ request()->routeIs('admin.hero.*') ? 'active' : '' }}" href="{{ route('admin.hero.index') }}">Hero</a></li>
                            <li><a class="{{ request()->routeIs('admin.video.*') ? 'active' : '' }}" href="{{ route('admin.video.index') }}">Video</a></li>
                        @endrole
                        <li><a href="#">Sub menu ketiga</a></li>
                    </ul>
                </div>
            </li>

        </ul>

        {{-- 3. MENU BERBATAS HAK AKSES --}}
        @can('users.manage')
            <div class="side-label">Administrasi</div>
            <ul class="side-menu">
                <li>
                    <a class="side-link" href="#">
                        <i class="bi bi-people"></i>
                        <span>Pengguna &amp; Role</span>
                    </a>
                </li>
            </ul>
        @endcan

    </nav>

    <div class="side-foot">BRIDA Provinsi Jawa Tengah</div>
</aside>
