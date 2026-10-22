{{-- ================= HERO SLIDER =================
     Cara pakai banner foto: ganti nilai --img pada tiap slide, mis. style="--img:url('{{ asset('assets/img/banner-1.jpg') }}')"
     lalu hapus blok .hero-copy jika teks sudah ada di dalam gambar. Tambah slide = salin satu .carousel-item
     beserta satu tombol indikator. --}}
<header class="hero" id="beranda">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500" data-bs-pause="hover">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <div class="hero-slide s1" style="--img:url('{{ asset('assets/img/banner-1.jpeg') }}')">
          <div class="hero-grid"></div>
          <div class="container">
            <div class="hero-copy">
              <span class="eyebrow">LFSP · Lembaga Fasilitasi dan Sinergitas Pesantren Jawa Tengah</span>
              <h1>Daftar Peserta <em>Lolos Seleksi</em> Akademik Wawancara</h1>
              <span class="pill-ribbon">Beasiswa Santri dan Pengasuh Pesantren Tahun 2026</span>
              <div class="hero-sub">Program Dalam Negeri</div>
              <div class="d-flex flex-wrap gap-3">
                <a href="#" class="btn btn-lime">Lihat Daftar Peserta <i class="bi bi-arrow-right ms-1"></i></a>
                <a href="#profil" class="btn btn-ghost">Tentang PINDAH</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="hero-slide s2" style="--img:url('{{ asset('assets/img/banner-2.jpg') }}')">
          <div class="hero-grid"></div>
          <div class="container">
            <div class="hero-copy">
              <span class="eyebrow">KRENOVA · Kreativitas dan Inovasi</span>
              <h1>Ajang tahunan untuk <em>inovator</em> Jawa Tengah</h1>
              <span class="pill-ribbon">Pendaftaran masih dibuka</span>
              <div class="hero-sub">Tunjukkan karya, jejaringkan gagasan.</div>
              <div class="d-flex flex-wrap gap-3">
                <a href="#krenova" class="btn btn-lime">Pelajari KRENOVA <i class="bi bi-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="hero-slide s3" style="--img:url('{{ asset('assets/img/banner-3.jpg') }}')">
          <div class="hero-grid"></div>
          <div class="container">
            <div class="hero-copy">
              <span class="eyebrow">Riset Provinsi Jawa Tengah</span>
              <h1>Satu pintu data <em>riset &amp; inovasi</em> daerah</h1>
              <span class="pill-ribbon">Periset · Lembaga · Publikasi</span>
              <div class="hero-sub">Temukan, kolaborasikan, terapkan.</div>
              <div class="d-flex flex-wrap gap-3">
                <a href="#riset" class="btn btn-lime">Jelajahi Riset <i class="bi bi-arrow-right ms-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Sebelumnya">
      <span class="ctl"><i class="bi bi-arrow-left"></i></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Berikutnya">
      <span class="ctl"><i class="bi bi-arrow-right"></i></span>
    </button>
  </div>
</header>
