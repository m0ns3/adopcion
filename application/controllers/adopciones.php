<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adopciones extends MY_Controller {
  function __construct() {
    parent::__construct();
    
  }

  public function index(){
    echo "controlador adopciones";
    echo "en rama nueva";
  }
}
