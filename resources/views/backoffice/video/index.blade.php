@extends('layouts.app')

@section('page_title', 'Video')
@section('page_lead', 'Kelola tautan video YouTube yang tampil di halaman depan.')
@section('actions')
    <a href="{{ route('admin.video.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Tambah video</a>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Pratinjau</th><th>Tautan</th><th>Dibuat</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                @forelse ($videos as $item)
                    <tr>
                        <td style="width:180px">
                            @if ($item->embedUrl())
                                <div class="ratio ratio-16x9 rounded overflow-hidden" style="width:160px">
                                    <iframe src="{{ $item->embedUrl() }}" title="Pratinjau video" allow="encrypted-media; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif
                        </td>
                        <td class="text-break"><a href="{{ $item->source_link }}" target="_blank" rel="noopener noreferrer">{{ $item->source_link }}</a></td>
                        <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('admin.video.show', $item->id) }}" class="btn btn-sm btn-outline-secondary" aria-label="Detail"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.video.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" aria-label="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.video.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus video ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" aria-label="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada video.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if ($videos->hasPages())
            <div class="card-body">
                {{ $videos->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
