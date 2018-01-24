<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mascotas extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->helper('form');
    	$this->load->helper('text');
    	$this->load->model('Mascotas_model'); 
    	$this->load->library('form_validation');
  	}
	public function index(){
		if ( ($this->session->userdata('logged_in')) == TRUE){
			$user_id =  $this->session->userdata('usr_id');
			$data['usuario'] = $this->session->userdata('usr_email');
	       	if ($this->Mascotas_model->mostrar_mascotas($user_id)) {
	       		$data['query'] = $this->Mascotas_model->mostrar_mascotas($user_id);
      			
	       	}else{
	       		$data['query'] = FALSE;
	       	}

	       	$this->load->view('common/header');
		    $this->load->view('common/login_header',$data);
		    $this->load->view('mascotas/view_all_pets', $data);
		    $this->load->view('common/footer');
		    
        	
    	}else{
    		redirect('signin');
    	}  
  
	}

	public function agregar_mascota(){

		$data['page_heading'] = 'Agregar mascota';  
	    // paso los valores de las tablas obtenidos en el modelo, a la vista
    	$data['estados_opciones'] = $this->Mascotas_model->mostrar_estados();
    	$data['razas_opciones'] = $this->Mascotas_model->mostrar_razas();

		$this->form_validation->set_rules('pet_nombre', 'Nombre de la mascota', 'trim|required|min_length[1]|max_length[50]');
	    $this->form_validation->set_rules('pet_especie', 'Especie', 'required');
	    $this->form_validation->set_rules('pet_estado', 'Estado', 'required');
	    $this->form_validation->set_rules('pet_raza', 'Raza', 'required');
	    $this->form_validation->set_rules('pet_sexo', 'Sexo', 'required');
	    $this->form_validation->set_rules('pet_edad', 'Edad', 'required');
	    $this->form_validation->set_rules('pet_color', 'Color de pelo', 'trim|min_length[1]|max_length[255]');
	    //$this->form_validation->set_rules('pet_foto', 'Foto de la mascota', 'trim|required|min_length[1]|max_length[20]');
	    
	    if ($this->form_validation->run() == FALSE) {
	    	
	    	$this->load->view('mascotas/agregar_mascota',$data);
	    }else{
	    	//do_upload();
		    $imagen = 'pet_foto';
		    $config['upload_path'] = '/var/www/html/prueba/upload/';
		    $config['allowed_types'] = 'jpg|jpeg|png';
		    $config['max_size'] = '2048';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';
		    $config['max_filename']  = '20';
		    $config['remove_spaces']  = TRUE;  

    		$this->load->library('upload', $config);

	    	if (! $this->upload->do_upload($imagen)){
	    	  $data = array('fail' => $this->upload->display_errors(),
	                        'success' => false);
		      $this->load->view('mascotas/agregar_mascota', $data);
		    }else{
	    	  $image_data = $this->upload->data();
		      $foto_nombre = $image_data['file_name'];
	    	

	    	  $mascota = array( 
			        'nombre' => $this->input->post('pet_nombre'), 
			        'especie' => $this->input->post('pet_especie'), 
			        'Estados_idEstados' => intval($this->input->post('pet_estado')) + 1, //intval() me permite tomar el valor en int del string que se pasa como parámetro
			        'Razas_idRazas' => intval($this->input->post('pet_raza')) + 1,  
			        'genero' => $this->input->post('pet_sexo'),
			        'edad' => $this->input->post('pet_edad'),
			        'tamanio' => $this->input->post('pet_tamanios'),
			        'color' => $this->input->post('pet_color'),
			        'esterilizado' => $this->input->post('pet_esterilizado'),
			        'temperamento' => $this->input->post('pet_temperamento'),
			        'descripcionMascota' => $this->input->post('pet_descripcion'),
			        'Usuarios_idUsuarios' => $this->input->post('usr_id'),
			        'foto_nombre' => $foto_nombre
		     		);
	    		if ($this->Mascotas_model->agregar_mascota($mascota)) {

		            //$this->session->set_flashdata('mensaje', 'Se agregó la mascota correctamente.');
		            //redirect('mascotas/agregar_mascota', 'refresh');
		            echo "mascota agregada";
        		}else {
		            //$this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
		            //redirect('mascotas/agregar_mascota', 'refresh');
		            echo "error";
        		}
	    	}
		}
	    
    }

    // private function do_upload(){

    // 	//$config['upload_path'] = base_url().'upload/';
    // 	$config['upload_path'] = '/var/www/html/prueba/upload/';
	   //  $config['allowed_types'] = 'jpg|jpeg|png';
	   //  //$config['file_name'] = convert_accented_characters($_FILES['userfile']['name']);
	   //  $config['max_size'] = '2048';
	   //  $config['max_width']  = '1024';
	   //  $config['max_height']  = '768';
	   //  $config['max_filename']  = '20';
	   //  $config['remove_spaces']  = TRUE;  

    // 	$this->load->library('upload', $config);

    // 	if (! $this->upload->do_upload()){
    // 	  $page_data = array('fail' => $this->upload->display_errors(),
    //                      	 'success' => false);
	   //    $this->load->view('mascotas/agregar_mascota', $page_data);
	   //  }else{
    // 	  $image_data = $this->upload->data();
	   //    return $foto_nombre = $image_data['file_name'];
    // 	}

    // }
}