<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input id="judul" name="judul" value="{{ old('judul', $hero->judul ?? '') }}" class="form-control @error('judul') is-invalid @enderror" maxlength="255" required>
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="ribbon" class="form-label">Ribbon</label>
    <input id="ribbon" name="ribbon" value="{{ old('ribbon', $hero->ribbon ?? '') }}" class="form-control @error('ribbon') is-invalid @enderror" maxlength="255" required>
    @error('ribbon')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="5" maxlength="10000" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $hero->deskripsi ?? '') }}</textarea>
    <div class="form-text">Maksimal 10.000 karakter.</div>
    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="banner" class="form-label">Banner {{ isset($hero) ? '(opsional bila tidak diganti)' : '' }}</label>
    <input id="banner" name="banner" type="file" accept="image/jpeg,image/png,image/webp" class="form-control @error('banner') is-invalid @enderror" {{ isset($hero) ? '' : 'required' }}>
    <div class="form-text">JPG, JPEG, atau PNG; maksimal 1 MB.</div>
    @error('banner')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @isset($hero)
        @if ($hero->banner)<img src="{{ asset('storage/'.$hero->banner) }}" alt="{{ $hero->judul }}" class="mt-3 rounded" style="max-width:240px;max-height:160px;object-fit:cover">@endif
    @endisset
</div>
<button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
<a href="{{ route('admin.hero.index') }}" class="btn btn-outline-secondary">Batal</a>
