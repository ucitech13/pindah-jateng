@extends('layouts.app')

@section('page_title', 'Edit berita')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li><li class="breadcrumb-item active">Edit</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('backoffice.berita._form', ['submitLabel' => 'Simpan perubahan'])
        </form>
    </div></div>
@endsection
