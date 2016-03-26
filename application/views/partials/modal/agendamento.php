<div class="modal fade" id="agendamento" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= (isset($agendamento['id']) && $agendamento['id']) ? 'Agendamento' : 'Novo Agendamento'; ?></h4>
      </div>
      <?php
        (isset($agendamento['id']) && $agendamento['id']) ? form_open('agendamento/carregaAgendamento') : form_open('agendamento/');

        if(isset($agendamento['cd_pessoa_prof']) && $agendamento['cd_pessoa_prof']):
          echo form_input(array(
              'type' => 'hidden',
              'name' => 'cd_pessoa_prof',
              'id' => 'profissional',
              'value' => $agendamento['cd_pessoa_prof']
            )
          );
        endif;

        if(isset($agendamento['id']) && $agendamento['id']):
          echo form_input(array(
              'type' => 'hidden',
              'name' => 'id_cadagenda',
              'id' => 'id-cadagenda',
              'value' => $agendamento['id']
            )
          );
        endif;

        if(isset($agendamento['id_confagenda']) && $agendamento['id_confagenda']):
          echo form_input(array(
              'type' => 'hidden',
              'name' => 'id_confagenda',
              'id' => 'id-confagenda',
              'value' => $agendamento['id_confagenda']
            )
          );
        endif;

        if(isset($encaixe) && $encaixe != ''):
          echo form_input(array(
              'type' => 'hidden',
              'name' => 'encaixe',
              'id' => 'encaixe-add',
              'value' => 'S'
            )
          );
        endif;

        if(isset($agendamento['dt_confirm']) && $agendamento['dt_confirm']):
          echo form_input(array(
              'type' => 'hidden',
              'name' => 'dt_confirm',
              'id' => 'dt-confirm',
              'value' => $agendamento['dt_confirm']
            )
          );
        endif;

        echo form_input(array(
            'type' => 'hidden',
            'name' => 'ordem',
            'id' => 'ordem',
            'value' => (isset($agendamento['ordem'])) ? $agendamento['ordem'] : ''
          )
        );
      ?>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8 col-sm-8 form-group">
              <?=
                form_dropdown(array(
                    'name' => 'paciente',
                    'id' => 'paciente',
                    'data-placeholder' => 'Paciente',
                    'class' => 'chosen-select form-control'
                  ), $pessoas,
                  (isset($agendamento['cd_pessoa']) && $agendamento['cd_pessoa'] != '') ? $agendamento['cd_pessoa'] : '',
                  (isset($agendamento['cd_pessoa'])) ? 'disabled' : ''
                );
              ?>
            </div>
            <div class="col-md-4 col-sm-4 form-group">
              <select id="status" class="form-control" <?= (isset($agendamento['agendamentoDecorrido']) || isset($agendamento['dt_confirm'])) ? 'disabled' : ''; ?>>
              <?php
                foreach ($status['opcoes'] as $value => $text) {
                  $selected = (isset($agendamento['status']) && $agendamento['status'] == $value) ? 'selected' : '';
                  $disabled = ($text == 'Atendido' || $text == 'Em Atendimento') ? 'disabled' : '';
                  echo "<option value='". $value . "' " . $selected . " " . $disabled . ">" . $text . "</option>";
                }
              ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 form-group">
              <div class='input-group'>
                <?=
                  form_input(array(
                      'type' => 'text',
                      'id' => 'data',
                      'name' => 'data',
                      'placeholder' => '00/00/0000',
                      'class' => 'form-control text-center'
                    ),
                    (isset($agendamento['data']) && $agendamento['data'] != '') ? date('d/m/Y', strtotime($agendamento['data'])) : date('d/m/Y'),
                    (isset($agendamento['agendamentoDecorrido'])) ? $agendamento['agendamentoDecorrido'] : ''
                  );
                ?>
                <label for="data" class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </label>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 form-group">
              <div class='input-group'>
                <?=
                  form_input(array(
                      'type' => 'text',
                      'name' => 'hora',
                      'id' => 'hora',
                      'placeholder' => '00:00',
                      'class' => 'form-control text-center horainicio datetimepicker'
                    ),
                    (isset($agendamento['hora']) && $agendamento['hora'] != '') ? date('H:i', strtotime($agendamento['hora'])) : date('H:i'),
                    (isset($agendamento['agendamentoDecorrido'])) ? $agendamento['agendamentoDecorrido'] : ''
                  );
                ?>
                <label for="hora" class="input-group-addon">
                  <span class="fa fa-clock-o"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 form-group">
              <?=
                form_input(array(
                    'type' => 'text',
                    'name' => 'fone',
                    'id' => 'fone',
                    'placeholder' => '(79) 0000-000',
                    'class' => 'form-control'
                  ),
                  (isset($agendamento['fone']) && $agendamento['fone'] != '') ? $agendamento['fone'] : '',
                  (isset($agendamento['agendamentoDecorrido'])) ? $agendamento['agendamentoDecorrido'] : ''
                );
              ?>
            </div>
            <div class="col-md-6 col-sm-6 form-group">
              <?=
                form_dropdown(array(
                    'name' => 'cd_convenio',
                    'id' => 'cd-convenio',
                    'class' => 'form-control'
                  ), $convenios,
                  (isset($agendamento['cd_convenio']) && $agendamento['cd_convenio'] != '') ? $agendamento['cd_convenio'] : '',
                  (isset($agendamento['agendamentoDecorrido'])) ? $agendamento['agendamentoDecorrido'] : ''
                );
              ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 form-group">
                <?php
                echo form_input(array(
                    'type' => 'hidden',
                    'name' => 'proc-hidden',
                    'id' => 'proc-hidden',
                  )
                );
                if(isset($procedimentosRealizados)) {
                campo_busca_multipla('procedimentos', 'modal-busca-procedimentos', 'cd_geral',
                                '%desc_cd_geral', 'Buscar procedimentos...', $procedimentosRealizados);
                } else {
                    campo_busca_multipla('procedimentos', 'modal-busca-procedimentos', 'cd_geral',
                                ' %desc_cd_geral', 'Buscar procedimentos...');
                }
                ?>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 form-group">
              <?=
                form_textarea(array(
                    'name' => 'observacao',
                    'id' => 'observacao',
                    'placeholder' => 'descricao',
                    'rows' => '4',
                    'class' => 'form-control'
                  ), (isset($agendamento['descricao']) && $agendamento['descricao'] != null) ? $agendamento['descricao'] : '',
                  (isset($agendamento['agendamentoDecorrido'])) ? $agendamento['agendamentoDecorrido'] : ''
                );
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <?php if(isset($agendamento['id']) && !isset($agendamento['agendamentoDecorrido'])): ?>
            <button type="button" class="btn btn-danger" id="excluir-agendamento">Excluir</button>
          <?php endif; ?>
          <?php if(!isset($agendamento['agendamentoDecorrido'])): ?>
            <button type="button" class="btn btn-default" id="marca-agendamento">
              <?= (isset($agendamento['id']) && $agendamento['id']) ? 'Atualizar' : 'Salvar' ;?>
            </button>
          <?php endif; ?>
          <?php if(!isset($agendamento['dt_confirm']) && (isset($agendamento['data']) && isset($agendamento['id'])) && strtotime($agendamento['data'])  == strtotime(date('Y/m/d'))): ?>
            <button type="button" class="btn btn-success" id="confirmar-agendamento">Confirmar atendimento</button>
          <?php elseif(isset($agendamento['dt_confirm']) && strtotime($agendamento['data'])  == strtotime(date('Y/m/d'))): ?>
            <button type="button" class="btn btn-primary" id="iniciar-atendimento">Iniciar Atendimento</button>
          <?php endif; ?>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
