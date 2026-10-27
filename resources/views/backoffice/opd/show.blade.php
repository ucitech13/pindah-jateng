@extends('layouts.app')

@section('page_title', 'Detail OPD')
@section('actions')
    <a href="{{ route('admin.opd.edit', $opd->id) }}" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit</a>
    <a href="{{ route('admin.opd.index') }}" class="btn btn-outline-secondary">Kembali</a>
@endsection

@section('content')
    <div class="card"><div class="card-body">
        <h2>{{ $opd->nama_opd }}</h2>
        <dl class="row mt-4">
            <dt class="col-sm-3">Nomor urut</dt><dd class="col-sm-9">{{ $opd->no_urut }}</dd>
            <dt class="col-sm-3">Dibuat</dt><dd class="col-sm-9">{{ $opd->created_at?->translatedFormat('d F Y H:i') }}</dd>
            <dt class="col-sm-3">Dibuat oleh (ID)</dt><dd class="col-sm-9">{{ $opd->created_by }}</dd>
        </dl>
    </div></div>
@endsection
