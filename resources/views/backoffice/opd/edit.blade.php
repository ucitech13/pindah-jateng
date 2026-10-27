@extends('layouts.app')

@section('page_title', 'Edit OPD')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.opd.index') }}">OPD</a></li><li class="breadcrumb-item active">Edit</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.opd.update', $opd->id) }}" method="POST">
            @csrf @method('PUT')
            @include('backoffice.opd._form', ['submitLabel' => 'Simpan perubahan'])
        </form>
    </div></div>
@endsection
