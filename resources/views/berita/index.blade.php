{{--
    DAFTAR BERITA. Variabel dari controller: $items (paginator).
    Pola ini bisa disalin untuk modul lain (inovasi, riset, dst.): salin folder berita/, ganti field dan nama route.
--}}
@extends('layouts.public-page')

@section('title', 'Berita — PINDAH Jateng')
@section('eyebrow', 'Informasi')
@section('page_title', 'Berita')
@section('page_lead', 'Kabar terbaru seputar inovasi dan riset daerah Provinsi Jawa Tengah.')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Berita</li>
@endsection

@section('page')
    @if ($items->isNotEmpty())
        <div class="row g-4">
            @foreach ($items as $berita)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('berita.show', $berita->slug) }}" class="post-card">
                        <div class="post-thumb">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" loading="lazy">
                            @else
                                <i class="bi bi-newspaper"></i>
                            @endif
                        </div>
                        <div class="post-body">
                            <span class="post-date">{{ $berita->published_at->translatedFormat('d F Y') }}</span>
                            <h3 class="post-title">{{ $berita->judul }}</h3>
                            <p class="post-excerpt">{{ \Illuminate\Support\Str::limit($berita->ringkasan, 120) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        @if ($items->hasPages())
            <div class="mt-5 d-flex justify-content-center">{{ $items->links() }}</div>
        @endif
    @else
        <div class="empty-state">
            <i class="bi bi-newspaper"></i>
            <p class="mb-0">Belum ada berita.</p>
        </div>
    @endif
@endsection
