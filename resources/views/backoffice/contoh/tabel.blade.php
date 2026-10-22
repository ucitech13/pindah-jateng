{{--
    CONTOH HALAMAN TABEL + tombol aksi di header.
    Tabel di bawah statis. Saat memakai Yajra DataTables, pola umumnya:

      1. @push('styles')  -> CSS DataTables (varian Bootstrap 5)
      2. ganti <tbody> dengan kosong, beri id pada <table id="tabel">
      3. @push('scripts') -> jQuery + DataTables + inisialisasi:
             $('#tabel').DataTable({ processing: true, serverSide: true, ajax: '{{ route("nama.route.data") }}', columns: [...] });
      4. controller mengembalikan DataTables::of($query)->make(true)

    Versi CDN DataTables dan kompatibilitas Yajra dengan Laravel 13 perlu Anda cek sendiri.
--}}
@extends('layouts.app')

@section('page_title', 'Contoh Tabel')
@section('page_lead', 'Pola halaman daftar data dengan tombol aksi di kanan atas.')

@section('breadcrumb')
    <li class="breadcrumb-item">Data Master</li>
    <li class="breadcrumb-item active" aria-current="page">Contoh Tabel</li>
@endsection

@section('actions')
    <a href="#" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah data</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="tabel">
                <thead>
                    <tr>
                        <th style="width:60px">No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Status</th>
                        <th class="text-end" style="width:120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (range(1, 5) as $i)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>Contoh data {{ $i }}</td>
                            <td class="text-muted-2">Nama instansi</td>
                            <td><span class="badge-role">Aktif</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary" aria-label="Ubah"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger" aria-label="Hapus"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
