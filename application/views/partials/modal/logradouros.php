<div class="modal fade" id="reg-logradouro" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registro de Logradouro</h4>
      </div>
      <form>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8 col-sm-8 form-group">
              <?php
                $attr = array('class' => 'control-label');
                echo form_label('Endereço:', 'reg-compl-cep', $attr);
                echo form_input(array(
                    'type' => 'text',
                    'name' => 'reg-compl-cep',
                    'id' => 'reg-compl-cep',
                    'data-required' => 'Endereço',
                    'class' => 'form-control text-left'
                  )
                );
              ?>
            </div>
            <div class="col-md-4 col-sm-4">
              <?php
                $attr = array('class' => 'control-label');
                echo form_label('CEP:', 'reg-cd-cep', $attr);
                echo form_input(array(
                    'type' => 'text',
                    'name' => 'reg_cd_cep',
                    'id' => 'reg-cd-cep',
                    'readonly' => true,
                    'class' => 'form-control text-center'
                  )
                );
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <?php
                $estado = array();
                if(isset($estados)){
                  for ($i=0; $i < count($estados); $i++) {
                    $cod_estado = trim($estados[$i]->cd_uf);
                    $estado[$cod_estado] = capitalize_string(trim($estados[$i]->nome_uf));
                  }
                }
                $attr = array('class' => 'control-label');
                echo form_label('Estado:', 'reg-cd-estado', $attr);
                echo form_dropdown(array(
                  'name' => 'reg_cd_estado',
                  'id' => 'reg-cd-estado',
                  'data-placeholder' => 'Selecione',
                  'class' => 'form-control text-left logradouro-chosen',
                  ),
                    $estado
                );
              ?>
            </div>
            <div class="col-md-4 form-group">
              <?php
                $attr = array('class' => 'control-label');
                echo form_label('Cidade:', 'reg-cd-cidade', $attr);
                echo form_dropdown(array(
                    'name' => 'reg_cd_cidade',
                    'id' => 'reg-cd-cidade',
                    'data-placeholder' => 'Selecione',
                    'class' => 'form-control text-left logradouro-chosen',
                  )
                );
              ?>
            </div>
            <div class="col-md-4 form-group">
              <?php
                $attr = array('class' => 'control-label');
                echo form_label('Bairro:', 'reg-cd-bairro', $attr);
                echo form_dropdown(array(
                    'name' => 'reg_cd_bairro',
                    'id' => 'reg-cd-bairro',
                    'data-placeholder' => 'Selecione',
                    'class' => 'form-control text-left logradouro-chosen',
                  )
                );
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default limpar-campos">Limpar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Fechar</button>
          <button type="button" id="registro-logradouro" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
