<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mascotas extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->helper('form');
    	$this->load->helper('text');
    	$this->load->model('Mascotas_model');
    	$this->load->model('Users_model'); 
    	$this->load->library('form_validation');
    	$this->form_validation->set_error_delimiters('<p class="alert alert-danger" role="alert"><strong>', '</strong></p>');
  	}
	public function index(){
		if ( ($this->session->userdata('logged_in')) == TRUE){
			$user_id =  $this->session->userdata('usr_id');
			$data['usuario'] = $this->session->userdata('usr_email');
	       	if ($this->Mascotas_model->mostrar_mascotas($user_id)) {
	       		$data['query'] = $this->Mascotas_model->mostrar_mascotas($user_id);
	       		$data['est'] = $this->Mascotas_model->mostrar_todos_estados();

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
 

		$data['pet_nombre'] = array('name' => 'pet_nombre', 'class' => 'form-control', 'id' => 'pet_nombre', 'value' => set_value('pet_nombre', ''), 'maxlength'   => '100', 'size' => '35');
	    $data['pet_especies'] = array('perro' => 'perro',
	      							 'gato'  => 'gato'
	      							);
	    // paso los valores de las tablas obtenidos en el modelo, a la vista
    	$data['estados_opciones'] = $this->Mascotas_model->mostrar_estados();
    	$data['razas_opciones'] = $this->Mascotas_model->mostrar_razas();
    	$data['edades'] = array('cachorro' => 'Cachorro',
	      				'joven'    => 'Joven',
	      				'adulto'   => 'Adulto',
	      				'anciano'  => 'Anciano'
	      				);
    	$data['tamanios'] = array('muychico' => 'Muy chico',
	      				   'chico'    => 'Chico',
	      				   'mediano'  => 'Mediano',
	      				   'grande'   => 'Grande',
	      				   'muygrande'=> 'Muy grande'
	      				);
      	$data['pet_color'] = array('name' => 'pet_color', 'class' => 'form-control', 'id' => 'pet_color', 'value' => set_value('pet_color', ''), 'maxlength'   => '100', 'size' => '35');
      	$data['pet_esterilizado'] = array('name' => 'pet_esterilizado', 'id' => 'pet_esterilizado', 'value' => set_value('pet_esterilizado', ''));
      	$data['pet_temperamento'] = array('name' => 'pet_temperamento', 'class' => 'form-control', 'id' => 'pet_temperamento', 'value' => set_value('pet_temperamento', ''), 'maxlength'   => '100', 'size' => '35');
      	$data['pet_descripcion'] = array('name' => 'pet_descripcion', 'class' => 'form-control', 'id' => 'pet_descripcion', 'value' => set_value('pet_descripcion', ''));
      	$data['pet_foto'] = array('name' => 'pet_foto', 'id' => 'pet_foto', 'value' => set_value('pet_foto', ''));
	    
		$this->form_validation->set_rules('pet_nombre', 'Nombre de la mascota', 'trim|required|min_length[1]|max_length[50]');
	    $this->form_validation->set_rules('pet_especie', 'Especie', 'required');
	    $this->form_validation->set_rules('pet_estado', 'Estado', 'required');
	    $this->form_validation->set_rules('pet_raza', 'Raza', 'required');
	    $this->form_validation->set_rules('pet_sexo', 'Sexo', 'required');
	    $this->form_validation->set_rules('pet_edad', 'Edad', 'required');
	    $this->form_validation->set_rules('pet_color', 'Color de pelo', 'trim|min_length[1]|max_length[255]');
	    //$this->form_validation->set_rules('pet_foto', 'Foto de la mascota', 'trim|required|min_length[1]|max_length[20]');
	    
	    if ($this->form_validation->run() == FALSE) {

	    

	    	$this->load->view('common/header');
      		if ( ($this->session->userdata('logged_in') == TRUE) AND 
       		($this->session->userdata('usr_access_level') == 1) ) {
        		$this->load->view('common/admin_login_header');
    		}else{
    			$data['usuario'] =  $this->session->userdata('usr_email');
    			$this->load->view('common/login_header', $data);
    		}  
      		$this->load->view('mascotas/agregar_mascota',$data);
      		$this->load->view('common/footer');
	    	
	    }else{
	    	//do_upload(); los datos ingresados son validos
		    $imagen = 'pet_foto';
		    $config['upload_path'] = './pics/';
		    $config['allowed_types'] = 'jpg|jpeg|png';
		    $config['max_size'] = '2048';
		    $config['max_width']  = '3000';
		    $config['max_height']  = '2000';
		    $config['max_filename']  = '20';
		    $config['remove_spaces']  = TRUE;
		    $config['file_name'] = convert_accented_characters($_FILES['pet_foto']['name']);
// var_dump($_FILES['pet_foto']['name']);
// exit;
		    
    		$this->load->library('upload', $config);
    		

	    	if (! $this->upload->do_upload($imagen)){
	    	  $data = array('fail' => $this->upload->display_errors(),
	                        'success' => false);

$data['pet_nombre'] = array('name' => 'pet_nombre', 'class' => 'form-control', 'id' => 'pet_nombre', 'value' => set_value('pet_nombre', ''), 'maxlength'   => '100', 'size' => '35');
	    $data['pet_especies'] = array('perro' => 'perro',
	      							 'gato'  => 'gato'
	      							);
	    // paso los valores de las tablas obtenidos en el modelo, a la vista
    	$data['estados_opciones'] = $this->Mascotas_model->mostrar_estados();
    	$data['razas_opciones'] = $this->Mascotas_model->mostrar_razas();
    	$data['edades'] = array('cachorro' => 'Cachorro',
	      				'joven'    => 'Joven',
	      				'adulto'   => 'Adulto',
	      				'anciano'  => 'Anciano'
	      				);
    	$data['tamanios'] = array('muychico' => 'Muy chico',
	      				   'chico'    => 'Chico',
	      				   'mediano'  => 'Mediano',
	      				   'grande'   => 'Grande',
	      				   'muygrande'=> 'Muy grande'
	      				);
      	$data['pet_color'] = array('name' => 'pet_color', 'class' => 'form-control', 'id' => 'pet_color', 'value' => set_value('pet_color', ''), 'maxlength'   => '100', 'size' => '35');
      	//$data['pet_esterilizado'] = array('name' => 'pet_esterilizado', 'id' => 'pet_esterilizado', 'value' => set_value('pet_esterilizado', ''));
      	$data['pet_temperamento'] = array('name' => 'pet_temperamento', 'class' => 'form-control', 'id' => 'pet_temperamento', 'value' => set_value('pet_temperamento', ''), 'maxlength'   => '100', 'size' => '35');
      	$data['pet_descripcion'] = array('name' => 'pet_descripcion', 'class' => 'form-control', 'id' => 'pet_descripcion', 'value' => set_value('pet_descripcion', ''));
      	$data['pet_foto'] = array('name' => 'pet_foto', 'id' => 'pet_foto', 'value' => set_value('pet_foto', ''));



		      $this->load->view('common/header');
      		  if ( ($this->session->userdata('logged_in') == TRUE) AND 
       			($this->session->userdata('usr_access_level') == 1) ) {
        		$this->load->view('common/admin_login_header');
    		  }else{
    			$data['usuario'] =  $this->session->userdata('usr_email');
    		  $this->load->view('common/login_header', $data);
    		  }  
      		  $this->load->view('mascotas/agregar_mascota',$data);
      		  $this->load->view('common/footer');
	    	
		    }else{
	    	  $image_data = $this->upload->data();
		      $foto_nombre = convert_accented_characters(($image_data['file_name']));
	    	

	    	  $mascota = array( 
			        'nombreMascota' => $this->input->post('pet_nombre'), 
			        'especie' => $this->input->post('pet_especie'), 
			        'Estados_idEstados' => intval($this->input->post('pet_estado')) + 1, //intval() me permite tomar el valor en int del string que se pasa como parámetro
			        'Razas_idRazas' => intval($this->input->post('pet_raza')) + 1,  
			        'genero' => $this->input->post('pet_sexo'),
			        'edad' => $this->input->post('pet_edad'),
			        'tamanio' => $this->input->post('pet_tamanios'),
			        'color' => $this->input->post('pet_color'),
			        'esterilizado' => $this->input->post('pet_esterilizado'),
			        'temperamento' => $this->input->post('pet_temperamento'),
			        'descripcion' => $this->input->post('pet_descripcion'),
			        'usr_id' => $this->input->post('usr_id'),
			        'foto' => 'pics/'.$foto_nombre
		     		);
	    	 
 
	    		if ($this->Mascotas_model->agregar_mascota($mascota)) {

		            $this->session->set_flashdata('mensaje', 'Has agregado una mascota.');
		            redirect('mascotas/agregar_mascota', 'refresh');
		      
        		}else {
		            $this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
		            redirect('mascotas/agregar_mascota', 'refresh');
		         
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

    public function ver_mas(){
    	$id = $this->uri->segment(3);
    	$mascota = $this->Mascotas_model->mostrar_mascota($id);
    	$data['mensaje'] = 'No se puede mostrar información de la mascota';
   
    	foreach ($mascota->result() as $row) {
	        $data['idMascota'] = $row->idMascota;
	        $estados_idEstados = $row->estados_idEstados;
	        $data['especie'] = $row->especie;
	        $razas_idRazas = $row->razas_idRazas;
	        $data['nombreMascota'] = $row->nombreMascota;
	        $data['genero'] = $row->genero;
	        $data['edad'] = $row->edad;
	        $data['tamanio'] = $row->tamanio;
	        $data['color'] = $row->color;
	        $esterilizado = $row->esterilizado;
	        $data['temperamento'] = $row->temperamento;
	        $data['descripcion'] = $row->descripcion;
	        //$publicado = $row->publicado;
	        $data['fecha'] = $row->fecha;
	        $usr_id = $row->usr_id;
	        $data['foto'] = $row->foto;
      }
      	$est = $this->Mascotas_model->mostrar_todos_estados();
      	foreach ($est->result() as $fila) {
			if ($fila->idEstados == $estados_idEstados) {
					$data['estado'] = $fila->descripcion; 
			}
		}
      	$raz = $this->Mascotas_model->mostrar_todas_razas();
      	foreach ($raz->result() as $filas) {
			if ($filas->idRazas == $razas_idRazas) {
					$data['raza'] = $filas->descripcion; 
			}
		}

		if ($esterilizado == 's') {
			$data['esterilizado'] = 'Si';
		}else{
			$data['esterilizado'] = 'Sin dato'; 
		}
		$usu = $this->Users_model->get_user_details($usr_id);
		foreach ($usu->result() as $f) {
			if ($f->usr_id == $usr_id) {
					$data['usr_email'] = $f->usr_email; 
			}
		}
    	$this->load->view('mascotas/ver_mas_pets',$data);

    }

    public function buscar_mascota(){

    	$this->form_validation->set_rules('pet_nom', 'Nombre de la mascota', 'trim|min_length[1]|max_length[50]');
	    $this->form_validation->set_rules('pet_color', 'Color de pelo', 'trim|min_length[1]|max_length[255]');

	    if ($this->form_validation->run() == FALSE) {

	    	$data['pet_especies'] = array('perro' => 'perro',
	      							 'gato'  => 'gato'
	      							);
	    	$data['estados_opciones'] = $this->Mascotas_model->mostrar_estados();
	    	$data['razas_opciones'] = $this->Mascotas_model->mostrar_razas();
	    	$data['edades'] = array('cachorro' => 'Cachorro',
		      				'joven'    => 'Joven',
		      				'adulto'   => 'Adulto',
		      				'anciano'  => 'Anciano'
		      				);
	    	$data['tamanios'] = array('muychico' => 'Muy chico',
		      				   'chico'    => 'Chico',
		      				   'mediano'  => 'Mediano',
		      				   'grande'   => 'Grande',
		      				   'muygrande'=> 'Muy grande'
		      				);

	    $this->load->view('common/header');
	  		if ( ($this->session->userdata('logged_in') == TRUE) AND 
	   		($this->session->userdata('usr_access_level') == 1) ) {
	    $this->load->view('common/admin_login_header');
			}
			if( ($this->session->userdata('logged_in') == TRUE) AND 
	   		($this->session->userdata('usr_access_level') != 1) ){
				$data['usuario'] =  $this->session->userdata('usr_email');
		$this->load->view('common/login_header', $data);
			}  
  		$this->load->view('mascotas/buscar_mascota',$data);
  		$this->load->view('common/footer');
	    }else{
	    	$mascota = array( 
			        'nombreMascota' => $this->input->post('pet_nom'), 
			        'especie' => $this->input->post('pet_especie'), 
			        'Estados_idEstados' => $this->input->post('pet_estado'), 
			        'Razas_idRazas' => $this->input->post('pet_raza'),  
			        'genero' => $this->input->post('pet_sexo'),
			        'edad' => $this->input->post('pet_edad'),
			        'tamanio' => $this->input->post('pet_tamanios'),
			        'color' => $this->input->post('pet_color'),
			        'esterilizado' => $this->input->post('pet_esterilizado'),
			        'temperamento' => $this->input->post('pet_temperamento'),
		     		);
	    	
	    	
	    	if (($data['encontrados'] = $this->Mascotas_model->buscar_mascotas($mascota))) {
	    		$data['est'] = $this->Mascotas_model->mostrar_todos_estados();
	    		$this->load->view('common/header');
		  		if ( ($this->session->userdata('logged_in') == TRUE) AND 
		   		($this->session->userdata('usr_access_level') == 1) ) {
		    		$this->load->view('common/admin_login_header');
				}
				if( ($this->session->userdata('logged_in') == TRUE) AND 
		   		($this->session->userdata('usr_access_level') != 1) ){
					$data['usuario'] =  $this->session->userdata('usr_email');
					$this->load->view('common/login_header', $data);
				}  
	  		$this->load->view('mascotas/resultados_pet',$data);
	  		$this->load->view('common/footer');
			
	    	}else{
	    		$data['not_found'] = TRUE;
	    		$this->load->view('common/header');
		  		if ( ($this->session->userdata('logged_in') == TRUE) AND 
		   		($this->session->userdata('usr_access_level') == 1) ) {
		    		$this->load->view('common/admin_login_header');
				}
				if( ($this->session->userdata('logged_in') == TRUE) AND 
		   		($this->session->userdata('usr_access_level') != 1) ){
					$data['usuario'] =  $this->session->userdata('usr_email');
					$this->load->view('common/login_header', $data);
				}  
	  		$this->load->view('mascotas/resultados_pet',$data);
	  		$this->load->view('common/footer');

	    	}
	    }	    
    }
}