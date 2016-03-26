<div class="modal fade" id="modal-atendimento" tabindex="-1" role="dialog" aria-labelledby="label-agenda-atendimento" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="label-agenda-atendimento">Novo Atendimento</h4>
            </div>
            <div class="modal-body">
              <form>
                <?php
                  if(isset($idCadagenda) && $idCadagenda):
                    echo form_input(array(
                        'type' => 'hidden',
                        'name' => 'id_cadagenda',
                        'id' => 'id-cadagenda',
                        'value' => $idCadagenda
                      )
                    );
                  endif;

                  if(isset($profissional_solic) && $profissional_solic):
                    echo form_input(array(
                        'type' => 'hidden',
                        'name' => 'profissional',
                        'id' => 'profissional',
                        'value' => $cd_pessoa_prof
                      )
                    );
                  endif;

                  if(isset($paciente) && $paciente):
                    echo form_input(array(
                        'type' => 'hidden',
                        'name' => 'paciente',
                        'id' => 'paciente',
                        'value' => $cd_pessoa
                      )
                    );
                  endif;
                ?>
                <div class="row">
                  <ul id="cabecalho-info-atend">
                    <li>
                      <strong>Med. Solicitante:</strong> <br>
                      <span><?= (isset($profissional_solic) && $profissional_solic != '') ? capitalize_string($profissional_solic) : ''; ?></span>
                    </li>
                    <li>
                      <strong>Paciente:</strong> <br>
                      <span><?= (isset($paciente)) ? capitalize_string($paciente) : ''; ?></span>
                    </li>
                    <li>
                      <strong>Data:</strong> <br>
                      <span><?= date('d/m/Y'); ?></span>
                    </li>
                    <li>
                      <strong>Hora:</strong> <br>
                      <span><?= date('H:i'); ?></span>
                    </li>
                  </ul>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6 col-sm-6 form-group">
                    <?php
                      echo form_label('CID', 'btn-cid');
                      campo_busca_simples('btn-cid', 'modal-busca-cids', 'cd_cid', '%desc_cid (%cd_cid)', 'Buscar CID...', $classes = 'btn');
                    ?>
                  </div>
                  <div class="col-md-6 col-sm-6 form-group">
                    <?=
                      form_label('Convenio', '') .
                      form_dropdown(array(
                          'name' => 'cd_convenio',
                          'id' => 'cd-convenio',
                          'class' => 'form-control'
                        ), $convenios
                      );
                    ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-sm-6 form-group">
                    <?=
                      form_label('Validade da Carteira', '') .
                      form_input(array(
                          'type' => 'date',
                          'name' => '',
                          'id' => '',
                          'class' => 'form-control'
                        )
                      );
                    ?>
                  </div>
                  <div class="col-md-4 col-sm-6 form-group">
                    <?=
                      form_label('Tipo de Plano', '') .
                      form_input(array(
                          'type' => 'text',
                          'name' => '',
                          'id' => '',
                          'class' => 'form-control'
                        )
                      );
                    ?>
                  </div>
                  <div class="col-md-4 col-sm-6 form-group">
                    <?=
                      form_label('Data da Autorização', '') .
                      form_input(array(
                          'type' => 'date',
                          'name' => '',
                          'id' => '',
                          'class' => 'form-control'
                        )
                      );
                    ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-sm-6 form-group">
                    <?=
                      form_label('Senha', '') .
                      form_input(array(
                          'type' => 'text',
                          'name' => '',
                          'id' => '',
                          'class' => 'form-control'
                        )
                      );
                    ?>
                  </div>
                  <div class="col-md-4 col-sm-6 form-group">
                    <?=
                      form_label('Validade da Senha', '') .
                      form_input(array(
                          'type' => 'date',
                          'name' => '',
                          'id' => '',
                          'class' => 'form-control'
                        )
                      );
                    ?>
                  </div>
                </div>






              </form>
                <div class="modatend">
                    <?php if(isset($ref1_5)) { ?>
                        <div>
                            <label for="modatend-ref1">$ref1_5</label>
                            <input type="text" id="modatend-ref1" class="form-control">
                        </div>
                    <?php } ?>
                    <div class="radiobox">
                        <label for="modatend-tp-atnd">Urgência</label>
                        <div>
                            <input type="radio" name="modatend-tp-atnd" id="modatend-tp-atnd-1" value="1">
                            <label for="modatend-tp-atnd-1">Normal</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-tp-atnd" id="modatend-tp-atnd-2" value="2">
                            <label for="modatend-tp-atnd-2">Urgente</label>
                        </div>
                    </div>
                    <div class="radiobox">
                        <label for="modatend-tp-atendimento">Tipo de Atendimento</label>
                        <div>
                            <input type="radio" name="modatend-tp-atendimento" id="modatend-tp-atendimento-1" value="1">
                            <label for="modatend-tp-atendimento-1">Remoção</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-tp-atendimento" id="modatend-tp-atendimento-2" value="2">
                            <label for="modatend-tp-atendimento-2">Pequena Cirurgia</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-tp-atendimento" id="modatend-tp-atendimento-3" value="3">
                            <label for="modatend-tp-atendimento-3">Terapias</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-tp-atendimento" id="modatend-tp-atendimento-4" value="4">
                            <label for="modatend-tp-atendimento-4">Consulta</label>
                        </div>
                    </div>
                    <div class="radiobox">
                        <label for="modatend-tp-saida">Tipo de Saída:</label>
                        <div>
                            <input type="radio" name="modatend-tp-saida" id="modatend-tp-saida-1" value="1">
                            <label for="modatend-tp-saida-1">Sim</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-tp-saida" id="modatend-tp-saida-2" value="2">
                            <label for="modatend-tp-saida-2">Não</label>
                        </div>
                    </div>
                    <div>
                        <label for="modatend-ind-acidente">Indicação de Acidente:</label>
                        <select id="modatend-ind-acidente" class="form-control">
                            <option value="9">Não Acidentes</option>
                            <option value="0">Trabalho</option>
                            <option value="1">Trânsito</option>
                            <option value="2">Outros</option>
                        </select>
                    </div>
                    <div class="radiobox">
                        <label for="modatend-recem-nasc">Recém-nascido:</label>
                        <div>
                            <input type="radio" name="modatend-recem-nasc" id="modatend-recem-nasc-1" value="1">
                            <label for="modatend-recem-nasc-1">Sim</label>
                        </div>
                        <div>
                            <input type="radio" name="modatend-recem-nasc" id="modatend-recem-nasc-2" value="2">
                            <label for="modatend-recem-nasc-2">Não</label>
                        </div>
                    </div>
                    <div>
                        <label for="modatend-posto">Posto de Coleta:</label>
                        <select id="modatend-posto" class="form-control">

                        </select>
                    </div>
                    <div>
                        <label for="modatend-guia">Núm. Guia:</label>
                        <input type="text" id="modatend-guia" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-danger">Desfazer</button>
                <button type="button" class="confirm btn btn-primary" id="atender-paciente" data-dismiss="modal">Atender</button>
            </div>
        </div>
    </div>
</div>
<style>
    .modatend {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: stretch;
        align-content: space-around;
    }
    .modatend > * {
        margin: 7px 0px;
    }
    .modatend-data-hora  {
        display: flex;
        justify-content: space-between;
    }
    .modatend-data-hora > * {
        width: 50%;
        width: calc(50% - 8px);
    }
    .modatend .radiobox {
        min-width: 150px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .modatend .radiobox > * {
        margin: 5px;
    }
    .modatend .radiobox > label:first-child {
        position: absolute;
        margin: 0;
        top: -10px;
        left: 10px;
        background-color: white;
        padding: 0 3px;
        /*white-space: nowrap;*/
        font-size: smaller;
    }
</style>
