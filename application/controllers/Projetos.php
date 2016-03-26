<?php

class Projetos extends MY_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('projetos_model');
    $this->load->library('pesquisas');
  }
  public function index(){
    $this->loadHead();
    $this->loadHeaderMenu();
    $data['projetos'] = $this->getProjetos();
    $this->load->view('projetos', $data);
    $this->loadScripts();
    $this->loadFoot();
  }

   public function pesquisa() {
    $maximo = 3;
    $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");


    if(isset($_GET['parametro'])) {
      if($_GET['parametro'] == '') {
        $this->entrada = $this->input->post("pesquisa_projeto");
      } else {
        $this->entrada = $_GET['parametro'];
      }
    } else {
      $this->entrada = $this->input->post("pesquisa_projeto");
    }

    $join = array(
      array(
      'tabela'=> 'cadpessoa',
      'campo' => 'cd_pessoa',
      'tipo'  => 'join'
      )
    );

    $parametro = array(
      'entrada' => trim($this->entrada),
      'inicio'  => $inicio,
      'maximo'  => $maximo,
      'join'    => $join,
      'get'     => 'cadprojeto',
      'camposChaves' => array(
        'cd_projeto',
        'desc_projeto'
      ),
      'orderBy' => array(
        'campo' => 'cd_projeto',
        'ordem' => 'asc'
      )
    );


    $linhas['projetos'] = $this->pesquisas->busca($parametro);

    if(is_array($linhas['projetos'])) {
      $config['suffix'] = '?parametro=' . $this->entrada;
      $config['base_url'] = site_url() . 'projetos/pesquisa/';
      $config['per_page'] = $maximo;
      $config["uri_segment"]  = 3;
      $config['page_query_string'] = FALSE;
      $config['enable_query_strings'] = FALSE;

      $config['first_url'] = site_url() . 'projetos/pesquisa/0/?parametro=' . $this->entrada;

      $config['first_link'] = 'Primeira';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '<li>';

      $config['last_link'] = 'Última';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';

      $config['next_link'] = 'Próximo';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';

      $config['prev_link'] = 'Anterior';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $data['num_resultado']  = $linhas['projetos']['numero_linhas'];
      $config['total_rows'] = $linhas['projetos']['numero_linhas'];
      $this->pagination->initialize($config);
      $data['paginacao'] = $this->pagination->create_links();
      $data['paginas'] = $linhas['projetos']['resultado'];
      $data['parametro_entrada'] = @$linhas['projetos']['parametro'];
    } else {
      $data['erro'] = array(
        'erro_entrada' => $parametro['entrada']
      );
    }
    $this->loadHead();
    $this->loadHeaderMenu();
    $this->load->view('projetos', $data);
    $this->loadScripts();
    $this->loadFoot();
  }

  public function setProjeto() {
    $data = array(
      'desc_projeto' => $this->input->post('desc_projeto'),
      'repo_git'     => $this->input->post('repo_git'),
      'token_git'    => $this->input->post('token_git')
    );
    $cd_projeto = $this->projetos_model->setProjeto($data);
    return $cd_projeto;
  }

  public function getProjetos() {
    $projetos = $this->projetos_model->getProjetos();
    return $projetos;
  }
}
