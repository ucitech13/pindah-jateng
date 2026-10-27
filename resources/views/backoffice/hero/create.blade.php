@extends('layouts.app')

@section('page_title', 'Tambah hero')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.hero.index') }}">Hero</a></li><li class="breadcrumb-item active">Tambah</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backoffice.hero._form', ['submitLabel' => 'Simpan hero'])
        </form>
    </div></div>
@endsection
