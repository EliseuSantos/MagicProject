<div class="modal fade modal-busca" id="<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true" data-multiple="<?=isset($multiple)?$multiple:''?>"
    data-ajax-url="<?=$ajaxURL?>" data-key="<?=$chave?>" data-selected="<?=htmlspecialchars(json_encode($selecionado))?>">
  <div class="modal-dialog modal-<?=isset($size)?$size:'auto'?>">
      <div class="modal-content modal-msgs">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?=$title?></h4>
        </div>
        <div class="modal-body">
          <div class="modal-busca-campo">
            <input type="text" class="form-control modal-busca-search">
            <button type="button" class="btn btn-success modal-busca-search">
              <span class="glyphicon glyphicon-zoom-in"></span>
            </button>
          </div>
          <table class="modal-table">
            <thead>
              <th>#
              <?php foreach($colunas as $col) {
                  echo '<th>',$col;
              }?>
            <tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
  </div>
</div>
