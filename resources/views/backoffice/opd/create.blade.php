@extends('layouts.app')

@section('page_title', 'Tambah OPD')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.opd.index') }}">OPD</a></li><li class="breadcrumb-item active">Tambah</li>@endsection

@section('content')
    <div class="card"><div class="card-body">
        <form action="{{ route('admin.opd.store') }}" method="POST">
            @csrf
            @include('backoffice.opd._form', ['submitLabel' => 'Simpan OPD'])
        </form>
    </div></div>
@endsection
