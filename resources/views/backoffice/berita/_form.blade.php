<div class="mb-3">
    <label for="judul" class="form-label">Judul berita</label>
    <input id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="form-control @error('judul') is-invalid @enderror" maxlength="255" required>
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi berita</label>
    <textarea id="deskripsi" name="deskripsi" rows="6" maxlength="10000" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $berita->deskripsi ?? '') }}</textarea>
    <div class="form-text">Maksimal 10.000 karakter.</div>
    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="gambar" class="form-label">Gambar {{ isset($berita) ? '(opsional bila tidak diganti)' : '' }}</label>
    <input id="gambar" name="gambar" type="file" accept="image/jpeg,image/png,image/webp" class="form-control @error('gambar') is-invalid @enderror" {{ isset($berita) ? '' : 'required' }}>
    <div class="form-text">JPG, PNG, atau WebP; maksimal 5 MB.</div>
    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @isset($berita)
        @if ($berita->gambar)<img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="mt-3 rounded" style="max-width:240px;max-height:160px;object-fit:cover">@endif
    @endisset
</div>
<button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
<a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">Batal</a>
