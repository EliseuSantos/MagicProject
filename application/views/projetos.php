<div class="content-marged">
  <div class="row container-fluid">
    <div class="col-md-12">
      <h3 class="border-bottom">Projetos</h3>
      <ul class="nav nav-tabs">
        <li class="active"><a id="tabcadastro" href="#cadastro" data-toggle="tab">Cadastrar</a></li>
        <li><a id="tabpesquisa" href="#pesquisa" data-toggle="tab">Pesquisar</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="cadastro">
          <?php
            $atributos = array('enctype' => 'multipart/form-data', 'webkitdirectory' => true);
            echo form_open('projetos/setProjeto', $atributos);
          ?>
            <div class="form-group">
              <label for="nome_projeto">Nome do Projeto</label>
              <input type="text" class="form-control" id="nome_projeto" name="nome_projeto" placeholder="Nome Projeto">
            </div>
            <div class="form-group">
              <label for="desc_projeto">Descrição do Projeto</label>
              <input type="text" class="form-control" id="desc_projeto" name="desc_projeto" placeholder="Nome Projeto">
            </div>
            <div class="form-group">
              <label for="repo_git">Endereço do GIT</label>
              <input type="text" class="form-control" id="repo_git" name="repo_git" placeholder="Endereço do GIT">
            </div>
            <div class="form-group">
              <label for="token_git">Token do Usuário &nbsp;</label><a>veja como obter</a>
              <input type="text" class="form-control" id="token_git" name="token_git" placeholder="Token">
            </div>
            <button type="submit" class="btn btn-default">Salvar</button>
          <?= form_close(); ?>
        </div>
        <div class="tab-pane fade" id="pesquisa">
          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <h2><?= (!isset($num_resultado)) ? '0' : $num_resultado; ?> resultados encontrado <?= (!isset($parametro_entrada) || empty($parametro_entrada)) ? '' : 'para: '. '<span class="text-navy">'.$parametro_entrada.'</span>'; ?></h2>
                  <small>Tempo de Resposta (0.23 secundos)</small>
                  <div class="search-form">
                    <?= form_open('projetos/pesquisa'); ?>
                      <div class="input-group">
                      <?php
                        if (!isset($parametro_entrada)) {
                          $parametro_entrada = '';
                        }
                      ?>
                        <input type="text" placeholder="Buscar projetos" id="pesquisa-projeto" name="pesquisa_projeto" class="form-control input-lg" value="<?= (isset($erro['erro_entrada'])) ? $erro['erro_entrada'] : '' ?>">
                        <div class="input-group-btn">
                          <button class="btn btn-lg btn-primary" type="submit">Buscar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <?php if (isset($paginas)): ?>
                    <?php foreach ($paginas as $projeto): ?>
                      <div class="search-result">
                        <h3><a href="#"><?= $projeto->nome_projeto; ?></a></h3>
                        <a href="<?= $projeto->repo_git; ?>" class="search-link"><?= $projeto->repo_git; ?></a>
                        <p>
                          <?= $projeto->desc_projeto; ?> </br>
                          <span class="label label-primary">20 Branches</span>
                          <span class="label label-success">220 Commits</span>
                          <span class="label label-danger">20 Issues</span>
                        </p>
                      </div>
                      <div class="hr-line-dashed"></div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">
                    <nav>
                      <ul class="pagination center">
                          <?php
                          if (isset($paginacao)):
                            echo $paginacao;
                          endif;
                          ?>

                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  if(window.location.pathname.indexOf("pesquisa") >= 0) {
    document.getElementById('tabpesquisa').click();
  } else {
    document.getElementById('tabcadastro').click();
  }
})
</script>