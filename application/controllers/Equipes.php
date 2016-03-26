<?php

class Equipes extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }
  public function index(){
    $this->loadHead();
    $this->loadHeaderMenu();
    $this->loadScripts();
    $this->load->view('equipes');
    $this->loadFoot();
  }
}
