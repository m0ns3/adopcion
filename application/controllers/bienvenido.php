<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bienvenido extends CI_Controller {

	
	public function index(){

		$this->load->view('common/header');
 
		$this->load->view('inicio');
 
		$this->load->view('common/footer');
	}
	
}
