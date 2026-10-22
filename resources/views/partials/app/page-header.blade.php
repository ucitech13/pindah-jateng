{{-- Header halaman: breadcrumb + judul + tombol aksi. Diisi lewat @section di tiap halaman. --}}
<div class="page-header">
    <div>
        @hasSection('breadcrumb')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        @endif

        <h1 class="page-title">@yield('page_title', 'Dashboard')</h1>

        @hasSection('page_lead')
            <p class="page-lead">@yield('page_lead')</p>
        @endif
    </div>

    @hasSection('actions')
        <div class="page-actions">@yield('actions')</div>
    @endif
</div>
