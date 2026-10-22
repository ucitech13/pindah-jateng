@extends('layouts.app')

@section('page_title', 'Tambah berita')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li><li class="breadcrumb-item active">Tambah</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backoffice.berita._form', ['submitLabel' => 'Simpan berita'])
        </form>
    </div></div>
@endsection
