<div class="mb-3">
    <label for="source_link" class="form-label">Tautan YouTube</label>
    <input id="source_link" name="source_link" type="url" value="{{ old('source_link', $video->source_link ?? '') }}" class="form-control @error('source_link') is-invalid @enderror" placeholder="https://www.youtube.com/watch?v=..." required>
    <div class="form-text">Masukkan tautan video YouTube (watch, youtu.be, embed, atau shorts).</div>
    @error('source_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-4">
    <span class="form-label d-block">Pratinjau</span>
    <div id="videoPreview" class="ratio ratio-16x9 rounded overflow-hidden bg-light border" style="max-width:560px">
        @if (isset($video) && $video->embedUrl())
            <iframe src="{{ $video->embedUrl() }}" title="Pratinjau video" allow="encrypted-media; picture-in-picture" allowfullscreen></iframe>
        @else
            <div class="d-flex align-items-center justify-content-center text-muted small px-3">Masukkan tautan YouTube untuk melihat pratinjau.</div>
        @endif
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
<a href="{{ route('admin.video.index') }}" class="btn btn-outline-secondary">Batal</a>

@push('scripts')
<script>
(function () {
    var input = document.getElementById('source_link');
    var preview = document.getElementById('videoPreview');
    if (!input || !preview) return;

    function youtubeId(url) {
        var match = String(url).match(/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/i);
        return match ? match[1] : null;
    }

    function render() {
        var id = youtubeId(input.value);
        if (!id) {
            preview.innerHTML = '<div class="d-flex align-items-center justify-content-center text-muted small px-3">Masukkan tautan YouTube untuk melihat pratinjau.</div>';
            return;
        }
        preview.innerHTML = '<iframe src="https://www.youtube.com/embed/' + id + '" title="Pratinjau video" allow="encrypted-media; picture-in-picture" allowfullscreen></iframe>';
    }

    input.addEventListener('input', render);
    input.addEventListener('change', render);
})();
</script>
@endpush
