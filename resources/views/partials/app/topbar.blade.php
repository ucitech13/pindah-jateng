@php
    $user = auth()->user();
    $initial = mb_strtoupper(mb_substr($user->name, 0, 1));
    $roleLabel = $user->getRoleNames()->first();
@endphp
<header class="app-topbar">

    <div class="topbar-left">
        <button type="button" class="icon-btn" id="sidebarToggle" aria-label="Tampilkan atau sembunyikan menu" aria-controls="appSidebar" aria-expanded="true">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <div class="topbar-right">

        {{-- Tema: light / dark / system. Logika di app.js --}}
        <div class="dropdown">
            <button type="button" class="icon-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Ubah tema">
                <i class="bi bi-circle-half" id="themeIcon"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end theme-menu">
                <li><button type="button" class="dropdown-item" data-theme-value="light"><i class="bi bi-sun"></i> Terang <i class="bi bi-check2"></i></button></li>
                <li><button type="button" class="dropdown-item" data-theme-value="dark"><i class="bi bi-moon-stars"></i> Gelap <i class="bi bi-check2"></i></button></li>
                <li><button type="button" class="dropdown-item" data-theme-value="system"><i class="bi bi-circle-half"></i> Sistem <i class="bi bi-check2"></i></button></li>
            </ul>
        </div>

        {{-- Pengguna --}}
        <div class="dropdown">
            <button type="button" class="user-chip dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="avatar">{{ $initial }}</span>
                <span class="user-meta d-none d-md-flex">
                    <strong>{{ $user->name }}</strong>
                    <small>{{ $roleLabel ?? 'Tanpa role' }}</small>
                </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" style="min-width:240px">
                <li class="user-head">
                    <strong>{{ $user->name }}</strong>
                    <small>{{ $user->email }}</small>
                </li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil saya</a></li>
                <li><a class="dropdown-item" href="{{ route('home') }}"><i class="bi bi-box-arrow-up-right me-2"></i>Lihat situs</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</header>
