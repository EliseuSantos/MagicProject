<?php
Class MY_Model extends CI_Model {
  public function __construct(){
  	parent::__construct();
  }

  // private function insertLog($acao, $motivo) {
  //   echo $acao . ' - ' . $motivo;
  //   die();
  //   $data = array(
  //     'login' => $this->session->userdata('login'),
  //     'programa' => $this->uri->segment(1),
  //     'dt_sistema' => 'now()',
  //     'ip' => $_SERVER['REMOTE_ADDR'],
  //     'acao' => $acao,
  //     'motivo' => $motivo
  //   );
  //   $this->db->insert('syslog', $data);
  //   if($this->db->affected_rows() > 0){
  //     return TRUE;
  //   } else {
  //     return FALSE;
  //   }
  // }
  //
  // public function __get($name, $value){
  //     $this->insertLog($name, $value);
  // }
}
?>
