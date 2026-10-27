@extends('layouts.app')

@section('page_title', 'Detail hero')
@section('actions')
    <a href="{{ route('admin.hero.edit', $hero->id) }}" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit</a>
    <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection

@section('content')
    <div class="card"><div class="card-body">
        @if ($hero->banner)<img src="{{ asset('storage/'.$hero->banner) }}" alt="{{ $hero->judul }}" class="img-fluid rounded mb-4" style="max-height:420px">@endif
        <h2>{{ $hero->judul }}</h2>
        <p class="mt-2"><span class="badge text-bg-secondary">{{ $hero->ribbon }}</span></p>
        <p class="mt-3">{{ $hero->deskripsi }}</p>
        <dl class="row mt-4">
            <dt class="col-sm-3">Dibuat</dt><dd class="col-sm-9">{{ $hero->created_at?->translatedFormat('d F Y H:i') }}</dd>
            <dt class="col-sm-3">Dibuat oleh (ID)</dt><dd class="col-sm-9">{{ $hero->created_by }}</dd>
        </dl>
    </div></div>
@endsection
