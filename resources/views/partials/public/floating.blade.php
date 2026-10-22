{{-- ================= FLOATING DEADLINE ================= --}}
{{-- Ubah tanggal batas waktu pada atribut data-deadline --}}
<div class="float-stack">
  <aside class="deadline" id="deadline" data-deadline="2026-11-30T23:59:59+07:00" aria-label="Batas waktu lomba KRENOVA">
    <div class="dl-top">
      <div class="dl-title">Batas Waktu<span>Lomba KRENOVA</span></div>
      <button class="dl-x" id="dlToggle" aria-label="Kecil/besarkan"><i class="bi bi-dash-lg"></i></button>
    </div>
    <div class="dl-body">
      <div class="dl-time">
        <div><b id="dd">00</b><small>Hari</small></div>
        <div><b id="dh">00</b><small>Jam</small></div>
        <div><b id="dm">00</b><small>Mnt</small></div>
        <div><b id="ds">00</b><small>Dtk</small></div>
      </div>
      <a class="dl-link" href="#krenova">Ikuti KRENOVA</a>
    </div>
  </aside>

  {{-- Ganti href dengan URL halaman polling inovasi --}}
  <a class="polling" id="polling" href="#" aria-label="Polling Inovasi">
    <svg class="pl-ico" viewBox="0 0 80 80" aria-hidden="true">
      <circle cx="40" cy="40" r="38" fill="#1f6b46"/>
      <path d="M40 78a38 38 0 0 0 38-38c0-3-.3-6-.9-8.8L52 56 40 78z" fill="#0e3d28" opacity=".55"/>
      <g transform="rotate(45 40 24)"><rect x="32" y="16" width="16" height="16" rx="2" fill="#a3e635"/></g>
      <rect x="22" y="36" width="36" height="26" rx="3" fill="#f6f3ec"/>
      <rect x="40" y="36" width="18" height="26" rx="3" fill="#ebe6d9"/>
      <rect x="30" y="35" width="20" height="4" rx="2" fill="#0b1f17"/>
    </svg>
    <span class="pl-title">Polling<br>Inovasi</span>
    <span class="pl-sub">Pilih inovasi favoritmu</span>
  </a>
</div>
