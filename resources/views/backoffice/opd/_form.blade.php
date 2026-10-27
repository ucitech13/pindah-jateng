<div class="mb-3">
    <label for="nama_opd" class="form-label">Nama OPD</label>
    <input id="nama_opd" name="nama_opd" value="{{ old('nama_opd', $opd->nama_opd ?? '') }}" class="form-control @error('nama_opd') is-invalid @enderror" maxlength="255" required>
    @error('nama_opd')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="no_urut" class="form-label">Nomor urut</label>
    <input id="no_urut" name="no_urut" type="number" min="1" max="999" value="{{ old('no_urut', $opd->no_urut ?? '') }}" class="form-control @error('no_urut') is-invalid @enderror" required>
    <div class="form-text">Angka 1–999, dipakai untuk urutan tampilan.</div>
    @error('no_urut')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
<a href="{{ route('admin.opd.index') }}" class="btn btn-outline-secondary">Batal</a>
