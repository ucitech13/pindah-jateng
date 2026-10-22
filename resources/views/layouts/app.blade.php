{{--
    LAYOUT AREA LOGIN (dashboard). Dipakai semua role setelah login.

    Pemakaian di halaman:

      @extends('layouts.app')
      @section('title', 'Judul Tab')              judul tab browser (opsional)
      @section('page_title', 'Judul Halaman')     h1 di header halaman
      @section('page_lead', 'Kalimat pengantar')  (opsional)
      @section('breadcrumb')                      (opsional; "Dashboard" otomatis di awal)
          <li class="breadcrumb-item active" aria-current="page">Halaman</li>
      @endsection
      @section('actions') <a class="btn btn-primary">Tambah</a> @endsection   (opsional, tombol kanan header)
      @section('content') ... @endsection         isi halaman

    Stack: @push('styles') dan @push('scripts') untuk CSS/JS per halaman (mis. DataTables).
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex, nofollow">
<title>@hasSection('title') @yield('title') @else @yield('page_title', 'Dashboard') — PINDAH Jateng @endif</title>

{{-- Harus sinkron dan sebelum CSS: memasang tema tanpa kilatan --}}
<script src="{{ asset('backoffice/assets/js/theme-init.js') }}"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
{{-- ?v=filemtime: browser otomatis memuat ulang saat file diubah --}}
<link href="{{ asset('backoffice/assets/css/app.css') }}?v={{ filemtime(public_path('backoffice/assets/css/app.css')) }}" rel="stylesheet">
@stack('styles')
</head>

<body class="app-body">
<div class="app-shell">

    @include('partials.app.sidebar')

    <div class="app-backdrop" id="appBackdrop"></div>

    <div class="app-main">
        @include('partials.app.topbar')

        <main class="app-content" id="main">
            @include('partials.app.page-header')
            @include('partials.app.alerts')

            @yield('content')
        </main>

        @include('partials.app.footer')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backoffice/assets/js/app.js') }}?v={{ filemtime(public_path('backoffice/assets/js/app.js')) }}"></script>
@stack('scripts')
</body>
</html>
