<?php
Class Usuario_model extends Pessoas_model {
  function __construct() {
    parent::__construct();
  }

  private $cd_usuario;
  private $usuario;
  private $login;
  private $senha;
  private $super;
  private $cd_ccusto;
  private $st_med;
  private $cd_pessoa;
  private $imagem;
  private $st_ativo;
  private $email;
  private $login_smart;
  private $cd_empresa;
  private $acesso_externo;
  private $ch_usuario_medlynx;
  private $ultima_atualizacao_senha;

  public function setUsuario($data) {
    $this->db->insert("segusuar", $data);
    $cd_usuario = $this->db->insert_id();
    return $cd_usuario;
  }

  public function getUsuario($cd_usuario) {
    $query = $this->db->where("cd_usuario", $cd_usuario)->get("segusuar");
		return $query->row();
  }

	public function loginUsuario($data) {
		// Pesquisa usuário para registo de autenticações em audit_segusuar
		$condition = "login ='" . trim($data['login']) . "' AND st_ativo = 'S'";
		$this->db->select('cd_usuario, cd_pessoa, usuario, login, cd_ccusto, st_med, cd_empresa, acesso_externo, ultimo_login');
		$this->db->from('segusuar');
		$this->db->where($condition);
		$this->db->limit(1);
		$usuarioQuery = $this->db->get();

		if ($usuarioQuery->num_rows() == 1) {
			// Autenticação para login de usuário
			$condition = "login ='" . trim($data['login']) . "' AND " . "senha ='" . $data['senha'] . "' AND " . "segusuar.st_ativo ='S'";
			$this->db->select('cd_usuario, segusuar.super, segusuar.secretaria, profissionais.reg_prof as profissional, segusuar.cd_pessoa, usuario, login, st_med, acesso_externo, ultimo_login, foto');
			$this->db->from('segusuar');
      $this->db->join('cadpessoa', 'segusuar.cd_pessoa = cadpessoa.cd_pessoa', 'left');
      $this->db->join('profissionais', 'profissionais.cd_pessoa = cadpessoa.cd_pessoa', 'left');
			$this->db->where($condition);
			$this->db->limit(1);
			$loginQuery = $this->db->get();

			if ($loginQuery->num_rows() == 1) {
				$audit = $loginQuery->result();
				$auditSegusuar = array(
					'cd_usuario' => $audit[0]->cd_usuario,
					'cd_pessoa' => $audit[0]->cd_pessoa,
					'st_login' => true,
					'dt_login' => 'now()'
				);

				//Atualiza o último login do usuário para o instante da ação
				$update = array(
					'ultimo_login' => 'now()'
				);
				$where = " login = '" . trim($data['login']) . "' and senha ='" . $data['senha'] . "'";
				if($this->db->update('segusuar' , $update, $where) && $this->auditoriaLogin($auditSegusuar)){
					return $loginQuery->result();
				}
			} else {
				$audit = $usuarioQuery->result();
				$auditSegusuar = array(
					'cd_usuario' => $audit[0]->cd_usuario,
					'cd_pessoa' => $audit[0]->cd_pessoa,
					'st_login' => false,
					'dt_login' => 'now()'
				);

				$auditoria = $this->auditoriaLogin($auditSegusuar);
				$this->notificacoes_model->cadastra(1, 'Falha de autenticação', $auditoria, $audit[0]->cd_usuario);
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	protected function auditoriaLogin($audit){
		if($this->db->insert('audit_segusuar', $audit)){
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}

	public function verificaAutenticacoesFalhas($ultimoLogin, $cdUsuario){
		$condition = "cd_usuario =" . $cdUsuario . " AND dt_login > '" . $ultimoLogin . "' AND st_login = FALSE";
		$this->db->select("dt_login");
		$this->db->from('audit_segusuar');
		$this->db->where($condition);
		$autenticacoesFalhas = $this->db->get();
		if($this->db->affected_rows()) {
			return $autenticacoesFalhas->result();
		} else {
			return FALSE;
		}
	}

	public function verificaAtualizacaoSenha($data) {
		$condition = "login ='" . trim($data['login']) . "' AND senha ='" . $data['senha'] . "' AND st_ativo ='S'";
		$this->db->select("(ultima_atualizacao_senha + interval '6 months')::date as ultima_atualizacao_senha ");
		$this->db->from('segusuar');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			if(date('Y-m-d') >= $row->ultima_atualizacao_senha){
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function atualizaSenha($data) {
		 $update = array(
		 	'senha' => $data['senha'],
			'ultima_atualizacao_senha' => date('Y-m-d')
		);
		$query = " login = '" . $data['login'] . "' and senha != '" . $data['senha'] . "'";
		$this->db->update('segusuar' , $update, $query);
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

  public function getCdPessoaUsuarioPorId($cd_usuario){
  	$this->db->select('cd_pessoa');
    $this->db->where('cd_usuario', $cd_usuario);
    $query = $this->db->get('segusuar');
    return $query->result()[0]->cd_pessoa;
  }

  public function verificarSenha($data) {
		$cd_usuario = $data['cd_usuario'];
		$senha = $data['senha'];
		$query = $this->db
		->select('cd_usuario')
		->where("cd_usuario = '$cd_usuario' and senha = '$senha'")
		->get('segusuar');
		if($query->num_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function getUsuarios() {
    $cd_usuario = $this->session->cd_usuario;
		$query = $this->db
		->select(array('cd_usuario', 'login'))
		->where("st_ativo = 'S' and cd_usuario != '$cd_usuario'")
		->get('segusuar');
		if($query->num_rows()) {
			return $query->result();
		} else {
			return false;
		}
	}

  public function getLogin($login, $cd_usuario) {
    if($cd_usuario) {
      $login_usuario = $this->db->select("login")->where("cd_usuario", $cd_usuario)->get("segusuar")->row()->login;
      $where = "login = '$login' and login != '$login_usuario'";
    } else {
      $where = "login = '$login'";
    }
    $this->db->select('login');
    $this->db->where($where);
    $query = $this->db->get('segusuar');
    if($query->num_rows()) {
			return $query->result();
		} else {
			return false;
		}
  }

  public function atualizarUsuario() {
    $data = array(
      'cd_usuario' => $this->input->post('cd_usuario'),
      'login' => $this->input->post('login'),
      'login' => $this->input->post('login'),
      'num_matricula' => $this->input->post('num_matricula'),
      'cd_empresa' => $this->input->post('cd_empresa'),
      'cd_ccusto' => $this->input->post('cd_ccusto'),
      'acesso_externo' => $this->input->post('acesso_externo'),
      'super' => $this->input->post('super')
    );
    $senha = $this->input->post('senha');
    if(!empty($senha)) {
      $data['senha'] = pass_cript($senha);
    }
    $this->db->where("cd_usuario", $data['cd_usuario'])->update("segusuar", $data);
  }

  public function getEmpresa($cd_usuario) {
    return $this->db
    ->select("cd_empresa")
    ->where("cd_usuario", $cd_usuario)
    ->get("segusuar")
    ->row()->cd_empresa;
  }

  public function getCentroCusto($cd_usuario) {
    return $this->db
    ->select("cd_ccusto")
    ->where("cd_usuario", $cd_usuario)
    ->get("segusuar")
    ->row()->cd_ccusto;
  }

}
?>
