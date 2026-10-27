@extends('layouts.app')

@section('page_title', 'Tambah video')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.video.index') }}">Video</a></li><li class="breadcrumb-item active">Tambah</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.video.store') }}" method="POST">
            @csrf
            @include('backoffice.video._form', ['submitLabel' => 'Simpan video'])
        </form>
    </div></div>
@endsection
