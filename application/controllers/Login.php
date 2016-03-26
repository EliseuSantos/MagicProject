<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Usuario {
	public function __construct() {
		parent:: __construct();
  	$this->load->helper('form');
	}

  public function index()	{
    $this->load->view('partials/login');
  	$this->load->view('login');
    $this->load->view('partials/foot');
  }

  public function autenticacao() {
    $this->login = $this->input->post("login");
    $this->senha = $this->input->post("senha");
    if(trim($this->login) != '' && trim($this->senha) != ''){
      $this->form_validation->set_rules('login', 'login', 'trim|required');
      $this->form_validation->set_rules('senha', 'senha', 'trim|required');
      if ($this->form_validation->run() == FALSE ){
        $this->session->set_flashdata('loginError', 'Erro de Autenticação');
        redirect(site_url());
      } else {
        //criptografando senha
        $senhaHash = pass_cript(trim($this->senha));
				if($senhaHash != FALSE){
					$data = array(
	          'login' => $this->login,
	          'senha' => $senhaHash
	        );
				} else {
					$data = array(
						'login' => $this->login,
						'senha' => $senhaHash
					);
					$this->usuario_model->loginUsuario($data);
					$dataError = array(
						'messageError' => 'Usuário ou Senha inválida',
						'user' => $this->login
					);
					$this->session->set_flashdata('dataError', $dataError);
					redirect(site_url());
				}


        $result = $this->usuario_model->verificaAtualizacaoSenha($data);
        if($result == TRUE){
          $this->session->set_flashdata('loginUsuario', $this->login);
          redirect(site_url('/usuario/atualizacaoSenha/'));
        } else {
          $result = $this->usuario_model->loginUsuario($data);
          if($result != FALSE){

						$this->session->set_userdata(array(
              'cd_usuario'        =>  $result['0']->cd_usuario,
              'cd_pessoa'        	=>  $result['0']->cd_pessoa,
              'user'              =>  $result['0']->usuario,
              'login'             =>  $result['0']->login,
              'ultimo_login'      =>  $result['0']->ultimo_login,
							'foto'							=> 	$result['0']->foto,
							'super'							=>	($result['0']->super == 'S') ? TRUE : FALSE,
							'profissional'			=>	($result['0']->profissional) ? TRUE : FALSE,
							'secretaria'				=>	($result['0']->secretaria) ? TRUE : FALSE,
              'logged_in'         =>  TRUE
            ));
            redirect(site_url('/home/'));
          } else {
            $dataError = array(
              'messageError' => 'Usuário ou Senha inválida',
              'user' => $this->login
            );
            $this->session->set_flashdata('dataError', $dataError);
            redirect(site_url());
          }
        }
      }
    } else {
      $dataError = array(
        'messageError' => 'Usuário ou Senha não preenchidos',
        'user' => $this->login
      );
      $this->session->set_flashdata('dataError', $dataError);
      redirect(site_url());
    }
  }
}
