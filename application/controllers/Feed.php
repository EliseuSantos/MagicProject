<?php

class Feed extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }
  public function index(){
    $this->loadHead();
    $this->loadHeaderMenu();
    $this->load->view('feed');
    $this->loadScripts();
    $this->loadFoot();
  }
}
