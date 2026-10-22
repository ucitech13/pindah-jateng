<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — PINDAH Jateng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">

</head>

<body>
    <div class="auth">

        <aside class="auth-aside">
            <a href="{{route('home')}}" class="brand">
                <!-- Ganti dengan logo resmi: <img src="assets/logo-jateng.png" alt="Logo Provinsi Jawa Tengah"> -->
                <span class="brand-mark">P</span>
                <span class="brand-text">
                    <b>PINDAH JATENG</b>
                    <small>Pusat Informasi Inovasi Daerah</small>
                    <small>Provinsi Jawa Tengah</small>
                </span>
            </a>

            <div>
                <h2 class="aside-title">Satu pintu untuk <em>inovasi</em> Jawa Tengah.</h2>
                <p class="aside-lead">Masuk untuk mengelola data inovasi, mengajukan layanan, dan mengikuti program
                    Badan Riset dan Inovasi Daerah.</p>
                <ul class="points">
                    <li><i class="bi bi-diagram-3"></i><span>Data inovasi masyarakat dan pemerintahan terpadu</span>
                    </li>
                    <li><i class="bi bi-geo-alt"></i><span>Peta sebaran inovasi di seluruh kabupaten/kota</span></li>
                    <li><i class="bi bi-trophy"></i><span>Akses lomba KRENOVA dan penghargaan inovasi</span></li>
                </ul>
            </div>

            <div class="aside-foot">© <span class="yr">2026</span> BRIDA Provinsi Jawa Tengah</div>
        </aside>

        <main class="auth-main">
            <div class="topbar">
                <a href="{{route('home')}}" class="back"><i class="bi bi-arrow-left"></i>Kembali ke beranda</a>
                <span class="switch">Belum punya akun? <a href="register.html">Daftar</a></span>
            </div>

            <div class="form-wrap">
                <div class="auth-card">
                    <span class="eyebrow">Masuk akun</span>
                    <h1>Selamat datang kembali</h1>
                    <p class="sub">Masukkan akun PINDAH Jateng Anda untuk melanjutkan.</p>

                    <div class="notice" id="notice"><i class="bi bi-info-circle-fill"></i><span>Mode demo: formulir
                            valid, tetapi belum terhubung ke server. Isi atribut <code>action</code> pada form untuk
                            menghubungkannya.</span></div>

                    <!-- Ganti action dengan endpoint login; tambahkan token CSRF dari backend -->
                    <form class="needs-check" action="{{ route('login') }}" method="post" novalidate>
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="field">
                            <label class="lbl" for="identity">Email atau nama pengguna</label>
                            <div class="control">
                                <i class="bi bi-person lead-ico"></i>
                                <input type="email" class="form-control" id="identity" name="email"
                                    placeholder="nama@email.go.id" autocomplete="username" required>
                                <div class="invalid-feedback">Email atau nama pengguna wajib diisi.</div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <label class="lbl" for="password">Kata sandi</label>
                                <a href="#" class="small fw-semibold">Lupa kata sandi?</a>
                            </div>
                            <div class="control">
                                <i class="bi bi-lock lead-ico"></i>
                                <input type="password" class="form-control has-toggle" id="password" name="password"
                                    placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                                <button type="button" class="pw-toggle" data-toggle-pw="password"
                                    aria-label="Tampilkan kata sandi"><i class="bi bi-eye"></i></button>
                                <div class="invalid-feedback">Kata sandi wajib diisi.</div>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat saya di perangkat ini</label>
                        </div>

                        <button type="submit" class="btn-main">Masuk <i class="bi bi-arrow-right"></i></button>
                    </form>

                    {{-- <div class="divider">atau</div>
                    <a href="register.html" class="btn-alt"><i class="bi bi-person-plus"></i>Buat akun baru</a> --}}

                    <p class="fine">Butuh bantuan? Hubungi <a
                            href="mailto:brida@jatengprov.go.id">brida@jatengprov.go.id</a></p>
                </div>
            </div>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
    <script>
        document.querySelectorAll('.yr').forEach(function(e) {
            e.textContent = new Date().getFullYear()
        })
    </script>
</body>

</html>
