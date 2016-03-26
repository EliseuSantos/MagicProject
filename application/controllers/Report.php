<?php

class Report extends MY_Controller {
   public $dirUpload = 'assets/uploads/report/';
  public function __construct() {
    parent::__construct();
  }
  public function index(){
    $this->loadHead();
    $this->loadHeaderMenu();
    $this->load->view('chamados');
    $this->loadScripts();
    $this->loadFoot();
  }

  public function uploadFoto() {
    print_r($_POST);
    print_r(file_get_contents('php://input'));
    die();
    if(isset($_FILES["file"]["type"])) {
      $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
      $extencao = '.'. explode("/", $_FILES["file"]["type"])[1];
      if ($_FILES["file"]["size"] < 2000000  && in_array($extencao,$permitidos)) {
        if ($_FILES["file"]["error"] > 0) {
          echo json_encode(false);
        } else {
          if (file_exists($this->dirUpload . $_FILES["file"]["name"])) {
            echo json_encode(false);
          } else {
            $nomefotoHash = md5(microtime()).$extencao;
            $pastaTemp = $_FILES['file']['tmp_name'];
            $pastaDestino = $this->dirUpload.$nomefotoHash;
            move_uploaded_file($pastaTemp,$pastaDestino);
            // $this->pessoas_model->renomeiaFoto($nomefotoHash, $cd_pessoa);
            echo json_encode($pastaDestino);
          }
        }
      } else {
        echo json_encode(false);
      }
    }
  }
}

