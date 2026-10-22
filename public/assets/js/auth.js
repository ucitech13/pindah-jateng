(function(){
  // show / hide password
  document.querySelectorAll('[data-toggle-pw]').forEach(function(btn){
    btn.addEventListener('click',function(){
      var input=document.getElementById(btn.dataset.togglePw);
      var show=input.type==='password';
      input.type=show?'text':'password';
      btn.innerHTML=show?'<i class="bi bi-eye-slash"></i>':'<i class="bi bi-eye"></i>';
      btn.setAttribute('aria-label',show?'Sembunyikan kata sandi':'Tampilkan kata sandi');
    });
  });

  // password strength (register page)
  var pw=document.getElementById('password'),meter=document.getElementById('strength'),txt=document.getElementById('strengthTxt');
  if(pw&&meter){
    var labels=['','Lemah','Cukup','Baik','Kuat'];
    pw.addEventListener('input',function(){
      var v=pw.value,s=0;
      if(v.length>=8)s++;
      if(/[a-z]/.test(v)&&/[A-Z]/.test(v))s++;
      if(/\d/.test(v))s++;
      if(/[^A-Za-z0-9]/.test(v)||v.length>=14)s++;
      if(!v)s=0;
      meter.dataset.level=s;
      txt.textContent=v?('Kekuatan: '+labels[s]):'Minimal 8 karakter; kombinasikan huruf besar/kecil, angka, dan simbol.';
    });
  }

  // validation + submit
  document.querySelectorAll('form.needs-check').forEach(function(form){
    var confirm=form.querySelector('#password2');
    function checkMatch(){
      if(!confirm)return;
      var ok=confirm.value===form.querySelector('#password').value;
      confirm.setCustomValidity(ok?'':'mismatch');
    }
    if(confirm){
      form.querySelector('#password').addEventListener('input',checkMatch);
      confirm.addEventListener('input',checkMatch);
    }
    form.addEventListener('submit',function(e){
      checkMatch();
      form.querySelectorAll('.form-control,.form-select').forEach(function(el){
        el.classList.toggle('is-invalid',!el.checkValidity());
        el.classList.toggle('is-valid',el.checkValidity() && el.value!=='');
      });
      var terms=form.querySelector('#terms');
      if(terms)terms.classList.toggle('is-invalid',!terms.checked);
      if(!form.checkValidity()){
        e.preventDefault();
        var first=form.querySelector(':invalid');
        if(first)first.focus();
        return;
      }
      // Belum ada backend: kalau action masih "#", tampilkan pesan demo saja.
      // Setelah action diisi endpoint sungguhan, form akan terkirim normal.
      if(form.getAttribute('action')==='#'){
        e.preventDefault();
        var n=document.getElementById('notice');
        if(n)n.classList.add('show');
      }
    });
    form.querySelectorAll('.form-control,.form-select').forEach(function(el){
      el.addEventListener('input',function(){
        if(el.classList.contains('is-invalid')&&el.checkValidity())el.classList.remove('is-invalid');
      });
    });
  });
})();
