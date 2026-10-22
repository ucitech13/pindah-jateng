/*
 * theme-init.js — dimuat SINKRON di <head>, sebelum CSS.
 * Tugasnya hanya satu: memasang tema dan status sidebar sebelum halaman digambar,
 * supaya tidak ada kilatan terang saat memuat ulang dalam mode gelap.
 * Logika interaktif (tombol tema, toggle sidebar) ada di app.js.
 */
(function () {
  var root = document.documentElement;
  var stored = null, side = null;

  try { stored = localStorage.getItem('pj-theme'); } catch (e) {}
  try { side = localStorage.getItem('pj-sidebar'); } catch (e) {}

  var mode = (stored === 'light' || stored === 'dark' || stored === 'system') ? stored : 'system';
  var dark = mode === 'dark' ||
    (mode === 'system' && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches);

  root.setAttribute('data-bs-theme', dark ? 'dark' : 'light');
  root.setAttribute('data-theme-mode', mode);

  // Sembunyi/tampil sidebar hanya berlaku di desktop; di mobile sidebar selalu tertutup saat dibuka.
  if (side === 'hidden' && window.matchMedia && window.matchMedia('(min-width: 992px)').matches) {
    root.classList.add('sidebar-hidden');
  }
})();
