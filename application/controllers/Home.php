<?php

class Home extends MY_Controller {
  public function index(){
    $this->loadHead();
    $this->loadHeaderMenu();
    $data= array();
    $this->load->view('home', $data);
    $this->loadScripts('home');
    $this->loadFoot();
  }
}
