/* app.js — perilaku shell dashboard: tema (light/dark/system) dan sidebar. */
(function () {
  'use strict';

  var root = document.documentElement;
  var THEME_KEY = 'pj-theme';
  var SIDE_KEY = 'pj-sidebar';
  var darkQuery = window.matchMedia('(prefers-color-scheme: dark)');
  var desktopQuery = window.matchMedia('(min-width: 992px)');

  function read(key) { try { return localStorage.getItem(key); } catch (e) { return null; } }
  function write(key, val) { try { localStorage.setItem(key, val); } catch (e) {} }

  /* ================= TEMA ================= */
  var ICONS = { light: 'bi-sun-fill', dark: 'bi-moon-stars-fill', system: 'bi-circle-half' };

  function currentMode() {
    var m = read(THEME_KEY);
    return (m === 'light' || m === 'dark' || m === 'system') ? m : 'system';
  }

  function applyTheme(mode) {
    var dark = mode === 'dark' || (mode === 'system' && darkQuery.matches);
    root.setAttribute('data-bs-theme', dark ? 'dark' : 'light');
    root.setAttribute('data-theme-mode', mode);

    document.querySelectorAll('[data-theme-value]').forEach(function (btn) {
      var on = btn.getAttribute('data-theme-value') === mode;
      btn.classList.toggle('active', on);
      btn.setAttribute('aria-pressed', on ? 'true' : 'false');
    });

    var icon = document.getElementById('themeIcon');
    if (icon) icon.className = 'bi ' + ICONS[mode];
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-theme-value]');
    if (!btn) return;
    var mode = btn.getAttribute('data-theme-value');
    write(THEME_KEY, mode);
    applyTheme(mode);
  });

  // Mode "system": ikuti perubahan tema OS secara langsung.
  function onSystemChange() { if (currentMode() === 'system') applyTheme('system'); }
  if (darkQuery.addEventListener) darkQuery.addEventListener('change', onSystemChange);
  else if (darkQuery.addListener) darkQuery.addListener(onSystemChange);

  applyTheme(currentMode());

  /* ================= SIDEBAR ================= */
  var toggleBtn = document.getElementById('sidebarToggle');
  var backdrop = document.getElementById('appBackdrop');

  function syncAria() {
    if (!toggleBtn) return;
    var open = desktopQuery.matches
      ? !root.classList.contains('sidebar-hidden')
      : root.classList.contains('sidebar-open');
    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  function toggleSidebar() {
    if (desktopQuery.matches) {
      var hidden = root.classList.toggle('sidebar-hidden');
      write(SIDE_KEY, hidden ? 'hidden' : 'shown');
    } else {
      root.classList.toggle('sidebar-open');
    }
    syncAria();
  }

  function closeMobile() { root.classList.remove('sidebar-open'); syncAria(); }

  if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
  if (backdrop) backdrop.addEventListener('click', closeMobile);

  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeMobile(); });

  // Tutup sidebar mobile setelah memilih menu (kecuali tombol pembuka submenu).
  document.querySelectorAll('.side-nav a[href]:not([data-bs-toggle])').forEach(function (a) {
    a.addEventListener('click', function () { if (!desktopQuery.matches) closeMobile(); });
  });

  // Pindah ke ukuran desktop: pastikan state mobile tidak tertinggal.
  function onResize() { if (desktopQuery.matches) root.classList.remove('sidebar-open'); syncAria(); }
  if (desktopQuery.addEventListener) desktopQuery.addEventListener('change', onResize);
  else if (desktopQuery.addListener) desktopQuery.addListener(onResize);

  syncAria();
})();
