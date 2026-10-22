/* public.js — perilaku bersama semua halaman publik (dipecah dari index.html) */
(function(){
  // navbar state
  var nw=document.getElementById('navWrap');
  function onScroll(){nw.classList.toggle('scrolled',window.scrollY>40)}
  onScroll();window.addEventListener('scroll',onScroll,{passive:true});

  // close mobile menu after click
  document.querySelectorAll('#mainNav a.nav-link:not(.dropdown-toggle), #mainNav .dropdown-item').forEach(function(a){
    a.addEventListener('click',function(){
      var el=document.getElementById('mainNav');
      if(el.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(el).hide();
    });
  });

  // scrollspy-lite for active link
  // hanya tautan anchor yang menunjuk ke halaman saat ini (href bisa berupa URL penuh /#profil)
  var links=[].slice.call(document.querySelectorAll('.glass-nav .nav-link[href*="#"]:not([href$="#"])'))
    .filter(function(a){return a.pathname===location.pathname});
  var map=links.map(function(l){return {l:l,s:document.querySelector(l.hash)}}).filter(function(x){return x.s});
  window.addEventListener('scroll',function(){
    var y=window.scrollY+160,cur=null;
    map.forEach(function(m){if(m.s.offsetTop<=y)cur=m});
    links.forEach(function(l){l.classList.remove('active')});
    if(cur)cur.l.classList.add('active');
  },{passive:true});

  // reveal + count-up
  function countUp(el){
    var t=+el.dataset.count,d=1400,s=null;
    function step(ts){
      if(!s)s=ts;var p=Math.min((ts-s)/d,1),e=1-Math.pow(1-p,3);
      el.textContent=Math.round(t*e).toLocaleString('id-ID');
      if(p<1)requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var io=new IntersectionObserver(function(en){
    en.forEach(function(e){
      if(!e.isIntersecting)return;
      e.target.classList.add('in');
      e.target.querySelectorAll('[data-count]').forEach(countUp);
      io.unobserve(e.target);
    });
  },{threshold:.15});
  document.querySelectorAll('.reveal').forEach(function(el){io.observe(el)});

  // countdown
  var box=document.getElementById('deadline'),end=new Date(box.dataset.deadline).getTime();
  function pad(n){return String(n).padStart(2,'0')}
  function tick(){
    var diff=Math.max(0,end-Date.now());
    document.getElementById('dd').textContent=pad(Math.floor(diff/864e5));
    document.getElementById('dh').textContent=pad(Math.floor(diff%864e5/36e5));
    document.getElementById('dm').textContent=pad(Math.floor(diff%36e5/6e4));
    document.getElementById('ds').textContent=pad(Math.floor(diff%6e4/1e3));
  }
  tick();setInterval(tick,1000);
  document.getElementById('dlToggle').addEventListener('click',function(e){
    e.stopPropagation();box.classList.toggle('min');
    this.innerHTML=box.classList.contains('min')?'<i class="bi bi-plus-lg"></i>':'<i class="bi bi-dash-lg"></i>';
  });
  var poll=document.getElementById('polling');
  if(window.matchMedia('(max-width:575.98px)').matches){box.classList.add('min');poll.classList.add('compact');document.getElementById('dlToggle').innerHTML='<i class="bi bi-plus-lg"></i>'}
  box.addEventListener('click',function(){if(box.classList.contains('min')){box.classList.remove('min');document.getElementById('dlToggle').innerHTML='<i class="bi bi-dash-lg"></i>'}});

  document.getElementById('yr').textContent=new Date().getFullYear();
})();
