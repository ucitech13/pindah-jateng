{{-- ================= HERO SLIDER ================= --}}
<header class="hero" id="beranda">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500" data-bs-pause="hover">
    @if ($heroes->count() > 1)
      <div class="carousel-indicators">
        @foreach ($heroes as $item)
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" @if($loop->first) aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
      </div>
    @endif
    <div class="carousel-inner">
      @forelse ($heroes as $item)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <div class="hero-slide s{{ ($loop->index % 3) + 1 }}" @if ($item->banner) style="--img:url('{{ asset('storage/'.$item->banner) }}')" @endif>
            <div class="hero-grid"></div>
            <div class="container">
              <div class="hero-copy">
                <h1>{{ $item->judul }}</h1>
                @if ($item->ribbon)
                  <span class="pill-ribbon">{{ $item->ribbon }}</span>
                @endif
                @if ($item->deskripsi)
                  <div class="hero-sub">{{ $item->deskripsi }}</div>
                @endif
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="carousel-item active">
          <div class="hero-slide s1">
            <div class="hero-grid"></div>
            <div class="container">
              <div class="hero-copy">
                <h1>PINDAH Jawa Tengah</h1>
                <div class="hero-sub">Belum ada banner hero.</div>
              </div>
            </div>
          </div>
        </div>
      @endforelse
    </div>
    @if ($heroes->count() > 1)
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Sebelumnya">
        <span class="ctl"><i class="bi bi-arrow-left"></i></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Berikutnya">
        <span class="ctl"><i class="bi bi-arrow-right"></i></span>
      </button>
    @endif
  </div>
</header>
