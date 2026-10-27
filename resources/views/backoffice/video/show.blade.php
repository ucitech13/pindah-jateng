@extends('layouts.app')

@section('page_title', 'Detail video')
@section('actions')
    <a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit</a>
    <a href="{{ route('admin.video.index') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection

@section('content')
    <div class="card"><div class="card-body">
        @if ($video->embedUrl())
            <div class="ratio ratio-16x9 rounded overflow-hidden mb-4" style="max-width:720px">
                <iframe src="{{ $video->embedUrl() }}" title="Pratinjau video" allow="encrypted-media; picture-in-picture" allowfullscreen></iframe>
            </div>
        @endif
        <dl class="row mt-2">
            <dt class="col-sm-3">Tautan</dt>
            <dd class="col-sm-9"><a href="{{ $video->source_link }}" target="_blank" rel="noopener noreferrer">{{ $video->source_link }}</a></dd>
            <dt class="col-sm-3">Dibuat</dt>
            <dd class="col-sm-9">{{ $video->created_at?->translatedFormat('d F Y H:i') }}</dd>
            <dt class="col-sm-3">Dibuat oleh (ID)</dt>
            <dd class="col-sm-9">{{ $video->created_by }}</dd>
        </dl>
    </div></div>
@endsection
