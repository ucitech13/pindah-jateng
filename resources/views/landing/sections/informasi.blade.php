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
          <div class="panel-head">
            <h3>Video</h3>
            @if ($videoTerbaru->count() > 1)
              <div class="mini-ctl">
                <button data-bs-target="#videoCarousel" data-bs-slide="prev" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
                <button data-bs-target="#videoCarousel" data-bs-slide="next" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
              </div>
            @else
              <span class="text-muted-2 small">YouTube</span>
            @endif
          </div>
          <div id="videoCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
              @forelse ($videoTerbaru as $video)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  @if ($video->youtubeId())
                    <div class="video-box" data-yt="{{ $video->youtubeId() }}">
                      <iframe src="{{ $video->embedUrl() }}" allow="encrypted-media; picture-in-picture" allowfullscreen title="Video PINDAH Jateng"></iframe>
                    </div>
                  @else
                    <div class="video-box">
                      <span class="video-cap">Tautan video tidak valid.</span>
                    </div>
                  @endif
                </div>
              @empty
                <div class="carousel-item active">
                  <div class="video-box">
                    <span class="video-cap">Belum ada video.</span>
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
