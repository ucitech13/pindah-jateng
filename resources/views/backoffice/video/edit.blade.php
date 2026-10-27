@extends('layouts.app')

@section('page_title', 'Edit video')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.video.index') }}">Video</a></li><li class="breadcrumb-item active">Edit</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.video.update', $video->id) }}" method="POST">
            @csrf @method('PUT')
            @include('backoffice.video._form', ['submitLabel' => 'Simpan perubahan'])
        </form>
    </div></div>
@endsection
