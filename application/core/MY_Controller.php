<?php
  class MY_Controller extends CI_Controller {
    public function __construct() {
      parent::__construct();
      date_default_timezone_set('America/Maceio');
    }

    protected function loadHead() {
        $data['cssIncludes'] = func_get_args();
        $this->load->view('partials/head',$data);
    }

    protected function loadScripts() {
        $data['jsIncludes'] = func_get_args();
        $this->load->view('partials/scripts',$data);
    }

    protected function loadFoot() {
        $this->load->view('partials/foot');
    }

    protected function loadHeaderMenu() {
      $this->load->view('partials/nav_top');
      $this->load->view('partials/menu');
    }

    public function is_ajax() {
      return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

  }

  class MY_Usuario extends MY_Controller {
  	public function __construct(){
  	  parent::__construct();
    }
  }
?>
