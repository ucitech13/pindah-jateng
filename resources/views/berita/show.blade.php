{{--
    DETAIL BERITA. Variabel dari controller: $berita (satu data), $lainnya (koleksi berita lain untuk sidebar).
    Field yang dipakai: judul, slug, gambar, created_at.
--}}
@extends('layouts.public-page')

@section('title', $berita->judul.' — PINDAH Jateng')
@section('meta_description', \Illuminate\Support\Str::limit($berita->deskripsi, 160))
@section('eyebrow', 'Berita')
@section('page_title', $berita->judul)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection

@section('page')
<div class="row g-5">
    <div class="col-lg-8">
        <article>
            <div class="article-meta">
                <span><i class="bi bi-calendar3"></i>{{ $berita->created_at?->translatedFormat('d F Y') }}</span>
            </div>

            @if ($berita->gambar)
                <div class="article-cover">
                    <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
                </div>
            @endif

            <div class="article-body">{!! nl2br(e($berita->deskripsi)) !!}</div>
        </article>

        <a href="{{ route('berita.index') }}" class="btn btn-lime mt-5"><i class="bi bi-arrow-left me-1"></i> Semua berita</a>
    </div>

    <aside class="col-lg-4">
        <div class="side-card">
            <h3>Berita lainnya</h3>
            @forelse ($lainnya as $item)
                <a href="{{ route('berita.show', $item->slug) }}" class="side-link">
                    <span>{{ $item->judul }}</span>
                    <small>{{ $item->created_at?->translatedFormat('d F Y') }}</small>
                </a>
            @empty
                <p class="text-muted-2 mb-0">Belum ada berita lain.</p>
            @endforelse
        </div>
    </aside>
</div>
@endsection
