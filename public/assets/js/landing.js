/* landing.js — perilaku khusus landing page (dipecah dari index.html) */
(function(){
  // video lazy load
  var vb=document.getElementById('videoBox');
  vb.addEventListener('click',function(){
    var id=vb.dataset.yt;
    if(!id){return;}
    vb.innerHTML='<iframe src="https://www.youtube.com/embed/'+id+'?autoplay=1" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen title="Video PINDAH Jateng"></iframe>';
  });

})();
