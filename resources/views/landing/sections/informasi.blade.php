{{-- ================= BERITA & VIDEO ================= --}}
<section class="sec bg-sand" id="informasi">
  <div class="container">
    <div class="mb-5 reveal">
      <span class="eyebrow sec-label">Informasi</span>
      <h2 class="sec-title mb-0">Kabar terbaru</h2>
    </div>
    <div class="row g-4">
      <div class="col-lg-7 reveal">
        <div class="panel">
          <div class="panel-head">
            <h3>Berita</h3>
            <div class="mini-ctl">
              <button data-bs-target="#newsCarousel" data-bs-slide="prev" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
              <button data-bs-target="#newsCarousel" data-bs-slide="next" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
            </div>
          </div>
          <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
              @forelse ($beritaTerbaru as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <div class="news-slide row g-4 align-items-center">
                    <div class="col-md-6 order-md-2"><div class="news-thumb">
                      @if ($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid">
                      @else
                        <i class="bi bi-newspaper position-relative" style="z-index:2"></i>
                      @endif
                    </div></div>
                    <div class="col-md-6 order-md-1">
                      <span class="date-badge">{{ $item->created_at?->translatedFormat('d F Y') }}</span>
                      <h4><a href="{{ route('berita.show', $item->slug) }}">{{ $item->judul }}</a></h4>
                      <p class="text-muted-2 mb-0">{{ \Illuminate\Support\Str::limit($item->deskripsi, 140) }}</p>
                    </div>
                  </div>
                </div>
              @empty
                <div class="carousel-item active">
                  <div class="news-slide row g-4 align-items-center"><div class="col-12"><p class="text-muted-2 mb-0">Belum ada berita terbaru.</p></div></div>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 reveal d1">
        <div class="panel">
          <div class="panel-head"><h3>Video</h3><span class="text-muted-2 small">YouTube</span></div>
          {{-- Isi data-yt dengan ID video YouTube; klik akan memuat pemutar --}}
          <div class="video-box" id="videoBox" data-yt="">
            <span class="play"><i class="bi bi-play-fill"></i></span>
            <span class="video-cap">Profil PINDAH Jateng</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
