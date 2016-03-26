<?php
Class Projetos_model extends MY_Model {
  function __construct() {
    parent::__construct();
  }

  public function setProjeto($data) {
    $this->db->insert("cadprojeto", $data);
    $cd_projeto = $this->db->insert_id();
    return $cd_projeto;
  }

  public function autalizaProjeto() {

  }

  public function getProjetos() {
    return $this->db->get('cadprojeto')->result();
  }
}
?>