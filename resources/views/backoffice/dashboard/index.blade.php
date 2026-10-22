@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_lead', 'Ringkasan aktivitas Anda di PINDAH Jateng.')

@section('actions')
    <a href="{{ route('home') }}" class="btn btn-outline-primary">
        <i class="bi bi-box-arrow-up-right me-1"></i> Lihat situs publik
    </a>
@endsection

@section('content')

    {{-- 1. SAPAAN + ROLE --}}
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h4 mb-1">Selamat datang, {{ auth()->user()->name }}</h2>
            <p class="text-muted-2 mb-0">Anda masuk dengan hak akses:</p>
            <div class="d-flex flex-wrap gap-2 mt-2">
                @forelse (auth()->user()->getRoleNames() as $role)
                    <span class="badge-role">{{ $role }}</span>
                @empty
                    <span class="badge-role">belum ada role</span>
                @endforelse
            </div>
        </div>
    </div>

    {{-- 2. KARTU STATISTIK. Data dari controller: $stats = [['icon','label',value], ...] --}}
    <div class="row g-3 g-lg-4 mb-4">
        @foreach ($stats as $stat)
            <div class="col-6 col-xl-3">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <span class="stat-icon"><i class="bi {{ $stat['icon'] }}"></i></span>
                        <div>
                            <div class="stat-value">{{ $stat['value'] ?? '—' }}</div>
                            <div class="stat-label">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-3 g-lg-4">

        {{-- 3. TABEL DATA TERBARU (pola dari contoh tabel). Data dari controller: $recent --}}
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>Data terbaru</span>
                    <a href="{{ route('contoh.tabel') }}" class="btn btn-sm btn-outline-primary">Lihat semua</a>
                </div>
                <div class="card-body p-0">
                    @if (count($recent))
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:60px">No</th>
                                        <th>Nama</th>
                                        <th>Instansi</th>
                                        <th>Status</th>
                                        <th class="text-end" style="width:100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recent as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row['nama'] }}</td>
                                            <td class="text-muted-2">{{ $row['instansi'] }}</td>
                                            <td><span class="badge-role">{{ $row['status'] }}</span></td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-outline-primary"
                                                    aria-label="Lihat"><i class="bi bi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p class="mb-0">Belum ada data.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- 4. PINTASAN --}}
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header">Pintasan</div>
                <div class="card-body">
                    <ul class="list-plain">
                        <li><a href="{{ route('contoh.tabel') }}" class="text-decoration-none"><i
                                    class="bi bi-table me-2"></i>Contoh halaman tabel</a></li>
                        <li><a href="{{ route('contoh.kosong') }}" class="text-decoration-none"><i
                                    class="bi bi-file-earmark me-2"></i>Contoh halaman kosong</a></li>
                        @can('users.manage')
                            <li><a href="#" class="text-decoration-none"><i class="bi bi-people me-2"></i>Kelola
                                    pengguna</a></li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
