<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mascotas extends MY_Controller {
  function __construct() {
    parent::__construct();
    
  }

  public function index(){
    $this->load->view('common/header');
    $this->load->view('common/admin_login_header');
    $this->load->view('common/footer');
  }
}
