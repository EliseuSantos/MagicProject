  <img src="" id="teste123">
  <div class="feedback left">
  <div class="tooltips">
    <div class="btn-group dropup">
      <button type="button" class="btn btn-primary dropdown-toggle btn-reporte btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bug fa-2x" title="Report Bug"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-right dropdown-menu-form">
        <li>
          <div class="report">
            <h5 class="text-center">Reportar Bug</h5>
            <form>
              <div class="col-sm-12">
                <input type="text" id="titulo-reporte" class="form-control" placeholder="Titulo do Reporte" value="">
                <textarea required="" class="form-control" placeholder="É a seguinte situação descreva a situação encontrada de forma simples e direta caso contrário será difícil resolver"></textarea>
                <input name="printScreen" type="hidden" class="screen-uri">
                <span class="printScreen pull-right"><i class="fa fa-camera cam" title="Tirar Print"></i></span>
               </div>
               <div class="col-sm-12 clearfix">
                <button id="reportar" class="btn btn-primary btn-block">Enviar Reporte</button>
               </div>
           </form>
          </div>
          <div class="loading text-center hide">
            <h2>Aguarde...</h2>
            <h2><i class="fa fa-refresh fa-spin"></i></h2>
          </div>
          <div class="report text-center hide">
            <h2>Concluido!</h2>
            <p>Seu reporte foi enviado com sucesso, obrigado por ajudar a fazer um sistema melhor e sem bugs. Vou corrigir SÓ DE RAIVA.......</p>
             <div class="col-sm-12 clearfix">
                <button class="btn btn-success btn-block do-close">Close</button>
             </div>
          </div>
          <div class="falha text-center hide">
            <h2>Erro!</h2>
            <p>Não foi possível concluir seu reporte.<br><br><a href="mailto:s.eliseu.santos@gmail.com">Enviar Email.</a></p>
             <div class="col-sm-12 clearfix">
                <button class="btn btn-danger btn-block do-close">Fechar</button>
             </div>
          </div>
        </li>
      </ul>
    </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var camera = new fireBug({
      'seletor' : '#reportar',
      'url' : 'report/uploadFoto',
      'callback' : 'funcaoCalback'
    });
  });
  </script>
</html>
