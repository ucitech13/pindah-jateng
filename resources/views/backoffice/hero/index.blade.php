@extends('layouts.app')

@section('page_title', 'Hero')
@section('page_lead', 'Kelola banner dan teks slider yang tampil di halaman depan.')
@section('actions')
    <a href="{{ route('admin.hero.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Tambah hero</a>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Banner</th><th>Judul</th><th>Ribbon</th><th>Deskripsi</th><th>Dibuat</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                @forelse ($heroes as $item)
                    <tr>
                        <td style="width:100px">
                            @if ($item->banner)
                                <img src="{{ asset('storage/'.$item->banner) }}" alt="{{ $item->judul }}" class="rounded" style="width:72px;height:52px;object-fit:cover">
                            @endif
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->ribbon }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</td>
                        <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('admin.hero.show', $item->id) }}" class="btn btn-sm btn-outline-secondary" aria-label="Detail"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.hero.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" aria-label="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.hero.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus hero ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" aria-label="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada hero.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if ($heroes->hasPages())
            <div class="card-body">
                {{ $heroes->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
