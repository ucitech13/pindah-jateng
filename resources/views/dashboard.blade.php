{{-- SEMENTARA: pindahkan ke layouts/app.blade.php setelah layout area login dibuat. --}}
@extends('layouts.public-page')

@section('title', 'Dashboard — PINDAH Jateng')
@section('eyebrow', 'Area anggota')
@section('page_title', 'Dashboard')

@section('page')
<div class="side-card">
    <p class="mb-1">Masuk sebagai <strong>{{ auth()->user()->name }}</strong></p>
    <p class="text-muted-2 mb-4">Role: {{ auth()->user()->getRoleNames()->implode(', ') ?: 'belum ada role' }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-lime">Keluar</button>
    </form>
</div>
@endsection
