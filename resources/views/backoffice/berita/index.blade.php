@extends('layouts.app')

@section('page_title', 'Berita')
@section('page_lead', 'Kelola informasi kabar terbaru yang tampil di halaman depan.')
@section('actions')
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Tambah berita</a>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th>Slug</th><th>Dibuat</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                @forelse ($berita as $item)
                    <tr>
                        <td style="width:100px">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="rounded" style="width:72px;height:52px;object-fit:cover">
                            @endif
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('admin.berita.show', $item->id) }}" class="btn btn-sm btn-outline-secondary" aria-label="Detail"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" aria-label="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" aria-label="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada berita.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if ($berita->hasPages())
            <div class="card-body">
                {{ $berita->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
