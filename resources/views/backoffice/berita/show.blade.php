@extends('layouts.app')

@section('page_title', 'Detail berita')
@section('actions')
    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit</a>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection

@section('content')
    <div class="card"><div class="card-body">
        @if ($berita->gambar)<img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded mb-4" style="max-height:420px">@endif
        <h2>{{ $berita->judul }}</h2>
        <p class="mt-3">{{ $berita->deskripsi }}</p>
        <dl class="row mt-4">
            <dt class="col-sm-3">Slug</dt><dd class="col-sm-9">{{ $berita->slug }}</dd>
            <dt class="col-sm-3">Dibuat</dt><dd class="col-sm-9">{{ $berita->created_at?->translatedFormat('d F Y H:i') }}</dd>
            <dt class="col-sm-3">Dibuat oleh (ID)</dt><dd class="col-sm-9">{{ $berita->created_by }}</dd>
        </dl>
    </div></div>
@endsection
