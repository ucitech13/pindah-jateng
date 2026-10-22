{{--
    DETAIL BERITA. Variabel dari controller: $berita (satu data), $lainnya (koleksi berita lain untuk sidebar).
    Field yang dipakai: judul, slug, ringkasan, isi, gambar, penulis, published_at.
--}}
@extends('layouts.public-page')

@section('title', $berita->judul.' — PINDAH Jateng')
@section('meta_description', $berita->ringkasan)
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
                <span><i class="bi bi-calendar3"></i>{{ $berita->published_at->translatedFormat('d F Y') }}</span>
                @if ($berita->penulis)
                    <span><i class="bi bi-person"></i>{{ $berita->penulis }}</span>
                @endif
            </div>

            @if ($berita->gambar)
                <div class="article-cover">
                    <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
                </div>
            @endif

            {{--
                AMAN secara bawaan: teks biasa di-escape, baris baru dijadikan <br>.
                Jika isi berasal dari editor HTML (TinyMCE/CKEditor), ganti dengan {!! $berita->isi !!}
                HANYA setelah HTML-nya disanitasi saat disimpan (mis. paket mews/purifier). Tanpa itu = celah XSS.
            --}}
            <div class="article-body">{!! nl2br(e($berita->isi)) !!}</div>
        </article>

        <a href="{{ route('berita.index') }}" class="btn btn-lime mt-5"><i class="bi bi-arrow-left me-1"></i> Semua berita</a>
    </div>

    <aside class="col-lg-4">
        <div class="side-card">
            <h3>Berita lainnya</h3>
            @forelse ($lainnya as $item)
                <a href="{{ route('berita.show', $item->slug) }}" class="side-link">
                    <span>{{ $item->judul }}</span>
                    <small>{{ $item->published_at->translatedFormat('d F Y') }}</small>
                </a>
            @empty
                <p class="text-muted-2 mb-0">Belum ada berita lain.</p>
            @endforelse
        </div>
    </aside>
</div>
@endsection
