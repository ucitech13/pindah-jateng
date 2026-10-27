@extends('layouts.app')

@section('page_title', 'Edit hero')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.hero.index') }}">Hero</a></li><li class="breadcrumb-item active">Edit</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('backoffice.hero._form', ['submitLabel' => 'Simpan perubahan'])
        </form>
    </div></div>
@endsection
