<?php

class Chamados extends MY_Controller {
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
}
