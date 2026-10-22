{{--
    HALAMAN KOSONG SIAP PAKAI.
    Salin file ini ke resources/views/<modul>/<nama>.blade.php, ganti teks di bawah, lalu isi @section('page').
    Header (judul + breadcrumb) dan navbar/footer sudah otomatis dari layout.
--}}
@extends('layouts.public-page')

@section('title', 'Judul Halaman — PINDAH Jateng')
@section('eyebrow', 'Kategori')
@section('page_title', 'Judul Halaman')
@section('page_lead', 'Kalimat pengantar singkat (hapus baris ini jika tidak perlu).')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Judul Halaman</li>
@endsection

@section('page')
    {{-- Isi halaman di sini --}}
@endsection
