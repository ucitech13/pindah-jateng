{{-- Pesan flash. Dari controller: ->with('success', '...') / 'error' / 'warning' / 'status' --}}
@foreach (['success' => 'success', 'status' => 'success', 'error' => 'danger', 'warning' => 'warning'] as $key => $type)
    @if (session($key))
        <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
            {{ session($key) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif
@endforeach
