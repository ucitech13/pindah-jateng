{{--
    Layout halaman dalam (non-landing): header gelap + judul + breadcrumb, lalu isi.
    Dipakai dengan @extends('layouts.public-page'). Slot yang tersedia:

      @section('title', '...')            judul tab browser
      @section('meta_description', '...') (opsional)
      @section('eyebrow', '...')          label kecil di atas judul
      @section('page_title', '...')       judul halaman (h1)
      @section('page_lead', '...')        (opsional) kalimat pengantar
      @section('breadcrumb') <li class="breadcrumb-item">...</li> @endsection   (opsional; "Beranda" otomatis)
      @section('page') ... @endsection    isi halaman
--}}
@extends('layouts.public')

@push('styles')
<link href="{{ asset('assets/css/page.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="page-head">
  <div class="container">
    @hasSection('breadcrumb')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        @yield('breadcrumb')
      </ol>
    </nav>
    @endif
    <span class="eyebrow">@yield('eyebrow', 'PINDAH Jateng')</span>
    <h1>@yield('page_title')</h1>
    @hasSection('page_lead')
    <p class="page-lead">@yield('page_lead')</p>
    @endif
  </div>
</section>

<section class="page-body">
  <div class="container">
    @yield('page')
  </div>
</section>
@endsection
