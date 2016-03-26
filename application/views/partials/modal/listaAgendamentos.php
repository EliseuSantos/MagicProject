<div class="modal fade" id="lista-agendamentos" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Lista de pacientes - <?= formato_dia($data) . ' de ' . transNomeMesPtBr(date('F', strtotime($data))) . ' de ' . formato_ano($data); ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
            <ul class="lista-pacientes">
            <?php 
              foreach ($agendamentos as $posicao => $agendamento) {
            ?>
              <li class="<?= $agendamento->classe; ?>">
                <div class="info pull-left">
                  <span class="badge"><?= $agendamento->ordem; ?></span>
                  <?= capitalize_string($agendamento->razao_social) . ' - ' . formato_hora_minuto($agendamento->hora); ?><br>
                  <small>
                    Marcado por <strong><?= capitalize_string($agendamento->resp_gera); ?></strong> 
                  <?php if($agendamento->resp_marca != ''): ?>
                    - Atualizado última vez por <strong><?= capitalize_string($agendamento->resp_marca); ?></strong>
                  <?php endif; ?>
                  </small>                 
                </div>
                <div class="lista-acoes pull-right">
                  <span id="editar-trigger" class="glyphicon glyphicon-pencil btn-primary" data-id-cadagenda="<?= $agendamento->id_cadagenda; ?>" data-toggle="tooltip" data-placement="left" title="Editar"></span>
                <?php if($agendamento->dt_confirm == ''): ?>
                  <span class="glyphicon glyphicon-ok btn-success" data-toggle="tooltip" data-placement="left" title="Confirmar Agendamento"></span>
                <?php endif; ?>
                  <span class="glyphicon glyphicon-trash btn-danger" data-toggle="tooltip" data-placement="left" title="Estornar"></span>
                </div>
              </li>
            <?php 
              }
            ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
