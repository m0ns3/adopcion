<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Register extends CI_Controller {
  function __construct() {
  parent::__construct();
  $this->load->helper('form');
  $this->load->helper('url');
  $this->load->helper('security');
  $this->load->model('Register_model');
  //this->load->library('encryption');
  $this->load->library('encrypt');
  $this->lang->load('es_admin', 'spanish');   
  $this->load->library('form_validation');
  $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
  $this->load->helper('string');
  $this->load->helper('file');
  }

  public function index() {
    // Set validation rules
    $this->form_validation->set_rules('usr_nombre', $this->lang->line('register_first_name'), 'trim|required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_apellido', $this->lang->line('register_last_name'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_email', $this->lang->line('register_email'), 'trim|required|min_length[1]|max_length[255]|valid_email|is_unique[usuarios.usr_email]');
    $this->form_validation->set_rules('usr_direccion', $this->lang->line('register_direccion'), 'trim|min_length[1]|max_length[255]');

    $this->form_validation->set_rules('usr_telefono', $this->lang->line('register_telefono'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_celular', $this->lang->line('register_celular'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_otro', $this->lang->line('register_otro'), 'trim|min_length[1]|max_length[255]');
    
    
    // Begin validation 
    if ($this->form_validation->run() == FALSE) { // Primera carga o problema con el formulario
      $this->load->view('common/header');
      $this->load->view('users/register'); 
      $this->load->view('common/footer');             
    } else { 
      // Create hash from user password 
      $password = random_string('alnum', 8);
      $hash = sha1($password);  
       
      $data = array( 
        'usr_nombre' => $this->input->post('usr_nombre'), 
        'usr_apellido' => $this->input->post('usr_apellido'), 
        'usr_email' => $this->input->post('usr_email'), 
        'usr_hash' => $hash, 
        'usr_direccion' => $this->input->post('usr_direccion'),
        'usr_telefono' => $this->input->post('usr_telefono'),
        'usr_celular' => $this->input->post('usr_celular'),
        'usr_otro' => $this->input->post('usr_otro'),
        'usr_access_level' => 2,
        'usr_is_active' => 1
      ); 

      if ($this->Register_model->register_user($data)) { //si se registró entonces envia el email
        $file = read_file('application/views/email_scripts/welcome.txt'); //uso ruta relativa
        $file = str_replace('%usr_nombre%', $data['usr_nombre'], $file);
        $file = str_replace('%usr_apellido%', $data['usr_apellido'], $file);
        $file = str_replace('%password%', $password, $file);

          //ENVIO DE EMAIL
          if (mail ($data['usr_email'], $this->lang->line('email_subject_new_password'),$file, 'From: rabitos@domain.com') ) {

              $this->session->set_flashdata('correcto', 'Enviamos un mensaje a tu correo, por favor revísalo.');
              redirect('register', 'refresh');
          }
      } else {
      
          redirect('register');
      
      }
    } 
  }
} 
