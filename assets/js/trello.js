document.addEventListener('DOMContentLoaded', function() {
  $('[data-toggle="popover"]').popover();
  document.getElementById('liNotificacao').addEventListener('click', function() {
    document.getElementById('conteudoNotificacao').toggle();
    document.getElementById('contadorNotificacao').style.display = 'none';
    document.addEventListener('click', function(e) {
      if(document.getElementById('conteudoNotificacao').style.display == 'block') {
        if(e.target.offsetParent.id != null && !e.target.offsetParent.id || e.target.offsetParent.id != 'liNotificacao') {
          document.getElementById('conteudoNotificacao').style.display = 'none';
        }

      }
    });
    return false;
  });
});

Element.prototype.toggle = function(){
  if (this.style.display == "none") {
    this.style.display = "block";
  } else {
    this.style.display = "none";
  }
};