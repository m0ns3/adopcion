<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->load->helper('file'); // for html emails
    $this->load->model('Users_model');
    $this->load->model('Password_model');

    if ( ($this->session->userdata('logged_in') == FALSE) || 
       ($this->session->userdata('usr_access_level') != 1) ) {
        redirect('signin');
    }  
  }
  
  public function index() {
    $this->load->view('common/header');
    $this->load->view('common/admin_login_header');
    $this->load->view('common/footer');
  } 
  public function listado_usuarios(){
    $data['page_heading'] = 'Lista de Usuarios';  
    $data['query'] = $this->Users_model->get_all_users();
    $this->load->view('common/header');
    $this->load->view('common/admin_login_header');
    $this->load->view('users/view_all_users', $data);
    $this->load->view('common/footer');
  }

  public function new_user(){
   // Set validation rules
    $this->form_validation->set_rules('usr_nombre', $this->lang->line('usr_fname'), 'trim|required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_apellido', $this->lang->line('usr_lname'), 'trim|min_length[1]|max_length[125]');
    // $this->form_validation->set_rules('usr_uname', $this->lang->line('usr_uname'), 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_email', $this->lang->line('usr_email'), 'trim|required|min_length[1]|max_length[255]|valid_email|is_unique[usuarios.usr_email]');
    $this->form_validation->set_rules('usr_confirm_email', $this->lang->line('usr_confirm_email'), 'trim|required|min_length[1]|max_length[255]|valid_email|matches[usr_email]');
    $this->form_validation->set_rules('usr_direccion', $this->lang->line('usr_direccion'), 'trim|min_length[1]|max_length[255]');
    $this->form_validation->set_rules('usr_telefono', $this->lang->line('usr_telefono'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_celular', $this->lang->line('usr_celular'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_otro', $this->lang->line('usr_otro'), 'trim|min_length[1]|max_length[255]');
    // $this->form_validation->set_rules('usr_zip_pcode', $this->lang->line('usr_zip_pcode'), 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_access_level', $this->lang->line('usr_access_level'), 'trim|required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_is_active', $this->lang->line('usr_is_active'), 'trim|required|max_length[1]|is_natural');



    $data['page_heading'] = 'Nuevo usuario';
    // Begin validation
    if ($this->form_validation->run() == FALSE) { // Compruebo si la validacion da falso, es decir si hubo errores, muestra los datos ingresados
    
      $data['usr_nombre'] = array('name' => 'usr_nombre', 'class' => 'form-control', 'id' => 'usr_nombre', 'value' => set_value('usr_nombre', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_apellido'] = array('name' => 'usr_apellido', 'class' => 'form-control', 'id' => 'usr_apellido', 'value' => set_value('usr_apellido', ''), 'maxlength'   => '100', 'size' => '35');
      // $data['usr_uname'] = array('name' => 'usr_uname', 'class' => 'form-control', 'id' => 'usr_uname', 'value' => set_value('usr_uname', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_email'] = array('name' => 'usr_email', 'class' => 'form-control', 'id' => 'usr_email', 'value' => set_value('usr_email', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_confirm_email'] = array('name' => 'usr_confirm_email', 'class' => 'form-control', 'id' => 'usr_confirm_email', 'value' => set_value('usr_confirm_email', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_direccion'] = array('name' => 'usr_direccion', 'class' => 'form-control', 'id' => 'usr_direccion', 'value' => set_value('usr_direccion', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_telefono'] = array('name' => 'usr_telefono', 'class' => 'form-control', 'id' => 'usr_telefono', 'value' => set_value('usr_telefono', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_celular'] = array('name' => 'usr_celular', 'class' => 'form-control', 'id' => 'usr_celular', 'value' => set_value('usr_celular', ''), 'maxlength'   => '100', 'size' => '35');
      $data['usr_otro'] = array('name' => 'usr_otro', 'class' => 'form-control', 'id' => 'usr_otro', 'value' => set_value('usr_otro', ''), 'maxlength'   => '100', 'size' => '35');      
      $data['usr_access_level'] = array(1=>1, 2=>2);
      
      $this->load->view('common/header');
      $this->load->view('common/admin_login_header');
      $this->load->view('users/new_user',$data);
      $this->load->view('common/footer');

      
    } else { // Validation passed, now escape the data. Exito
      $password = random_string('alnum', 8);
      $hash = $this->encrypt->sha1($password);  

      $data = array(
        'usr_nombre' => $this->input->post('usr_nombre'),
        'usr_apellido' => $this->input->post('usr_apellido'),
        //'usr_uname' => $this->input->post('usr_uname'),
        'usr_email' => $this->input->post('usr_email'),
        'usr_hash' => $hash,
        'usr_direccion' => $this->input->post('usr_direccion'),
        'usr_telefono' => $this->input->post('usr_telefono'),
        'usr_celular' => $this->input->post('usr_celular'),
        'usr_otro' => $this->input->post('usr_otro'),
        //'usr_zip_pcode' => $this->input->post('usr_zip_pcode'),
        'usr_access_level' => $this->input->post('usr_access_level'),
        'usr_is_active' => $this->input->post('usr_is_active')
      );

      if ($this->Users_model->process_create_user($data)) {
        $file = read_file('application/views/email_scripts/welcome.txt');
        $file = str_replace('%usr_nombre%', $data['usr_nombre'], $file);
        $file = str_replace('%usr_apellido%', $data['usr_apellido'], $file);
        $file = str_replace('%password%', $password, $file);
        

          if (mail ($data['usr_email'], $this->lang->line('email_subject_new_password'),$file, 'From: rabitos@domain.com') ) {
            //redirect('users');
            $this->session->set_flashdata('mensaje', 'Se agregó el usuario correctamente.');
            redirect('users/new_user', 'refresh');

            
            }else {
            $this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
            redirect('users/new_user', 'refresh');
            }
      }        
  }
}
  public function edit_user(){
    // Set validation rules
    $this->form_validation->set_rules('usr_id', $this->lang->line('usr_id'), 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_nombre', $this->lang->line('usr_fname'), 'trim|required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_apellido', $this->lang->line('usr_lname'), 'trim|min_length[1]|max_length[125]');
    //$this->form_validation->set_rules('usr_uname', $this->lang->line('usr_uname'), 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_email', $this->lang->line('usr_email'), 'trim|required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('usr_confirm_email', $this->lang->line('usr_confirm_email'), 'trim|required|min_length[1]|max_length[255]|valid_email|matches[usr_email]');
    $this->form_validation->set_rules('usr_direccion', $this->lang->line('usr_direccion'), 'trim|min_length[1]|max_length[255]');
    $this->form_validation->set_rules('usr_telefono', $this->lang->line('usr_telefono'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_celular', $this->lang->line('usr_celular'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_otro', $this->lang->line('usr_otro'), 'trim|min_length[1]|max_length[125]');
    //$this->form_validation->set_rules('usr_zip_pcode', $this->lang->line('usr_zip_pcode'), 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_access_level', $this->lang->line('usr_access_level'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_is_active', $this->lang->line('usr_is_active'), 'trim|max_length[1]|is_natural');

    if ($this->input->post()) {
      $id = $this->input->post('usr_id');
     
    } else {
      $id = $this->uri->segment(3); 
     
    }
           
    $data['page_heading'] = 'Editar usuario';                
    // Begin validation
    if ($this->form_validation->run() == FALSE) { // First load, or problem with form           
      $query = $this->Users_model->get_user_details($id);
      foreach ($query->result() as $row) {
        $usr_id = $row->usr_id;
        $usr_nombre = $row->usr_nombre;
        $usr_apellido = $row->usr_apellido;
        $usr_email = $row->usr_email;
        $usr_direccion = $row->usr_direccion;
        $usr_telefono = $row->usr_telefono;
        $usr_celular = $row->usr_celular;
        $usr_otro = $row->usr_otro;
        $usr_access_level = $row->usr_access_level;
        $usr_is_active = $row->usr_is_active;
      }

      $data['usr_nombre'] = array('name' => 'usr_nombre', 'class' => 'form-control', 'id' => 'usr_nombre', 'value' => set_value('usr_nombre', $usr_nombre), 'maxlength'   => '100', 'size' => '35');
      $data['usr_apellido'] = array('name' => 'usr_apellido', 'class' => 'form-control', 'id' => 'usr_apellido', 'value' => set_value('usr_apellido', $usr_apellido), 'maxlength'   => '100', 'size' => '35');
      //$data['usr_uname'] = array('name' => 'usr_uname', 'class' => 'form-control', 'id' => 'usr_uname', 'value' => set_value('usr_uname', $usr_uname), 'maxlength'   => '100', 'size' => '35');
      $data['usr_email'] = array('name' => 'usr_email', 'class' => 'form-control', 'id' => 'email', 'value' => set_value('usr_email', $usr_email), 'maxlength'   => '100', 'size' => '35');
      $data['usr_confirm_email'] = array('name' => 'usr_confirm_email', 'class' => 'form-control', 'id' => 'usr_confirm_email', 'value' => set_value('usr_confirm_email', $usr_email), 'maxlength'   => '100', 'size' => '35');
      $data['usr_direccion'] = array('name' => 'usr_direccion', 'class' => 'form-control', 'id' => 'usr_direccion', 'value' => set_value('usr_direccion', $usr_direccion), 'maxlength'   => '100', 'size' => '35');
      $data['usr_telefono'] = array('name' => 'usr_telefono', 'class' => 'form-control', 'id' => 'usr_telefono', 'value' => set_value('usr_telefono', $usr_telefono), 'maxlength'   => '100', 'size' => '35');
      $data['usr_celular'] = array('name' => 'usr_celular', 'class' => 'form-control', 'id' => 'usr_celular', 'value' => set_value('usr_celular', $usr_celular), 'maxlength'   => '100', 'size' => '35');
      $data['usr_otro'] = array('name' => 'usr_otro', 'class' => 'form-control', 'id' => 'usr_otro', 'value' => set_value('usr_otro', $usr_otro), 'maxlength'   => '100', 'size' => '35');
      //$data['usr_zip_pcode'] = array('name' => 'usr_zip_pcode', 'class' => 'form-control', 'id' => 'usr_zip_pcode', 'value' => set_value('usr_zip_pcode', $usr_zip_pcode), 'maxlength'   => '100', 'size' => '35');
      $data['usr_access_level_options'] = array(1=>1, 2=>2);
      $data['usr_access_level'] = array('value' => set_value('usr_access_level', $usr_access_level));
      $data['usr_is_active'] = $usr_is_active;
      $data['id'] = array('usr_id' => set_value('usr_id', $usr_id));

      $this->load->view('common/header');
      $this->load->view('common/admin_login_header');
      $this->load->view('users/edit_user', $data);
      $this->load->view('common/footer');
    } else { // Validation passed, now escape the data
      $data = array(
        'usr_nombre' => $this->input->post('usr_nombre'),
        'usr_apellido' => $this->input->post('usr_apellido'),
        'usr_email' => $this->input->post('usr_email'),
        'usr_direccion' => $this->input->post('usr_direccion'),
        'usr_telefono' => $this->input->post('usr_telefono'),
        'usr_celular' => $this->input->post('usr_celular'),
        'usr_otro' => $this->input->post('usr_otro'),
        'usr_access_level' => $this->input->post('usr_access_level'),
        'usr_is_active' => $this->input->post('usr_is_active')
      );
      if ($this->Users_model->process_update_user($id, $data)) {
        $this->session->set_flashdata('mensaje', 'Se modificó el usuario correctamente.');
        redirect('users/new_user', 'refresh');
      }else {
            $this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
            redirect('users/new_user', 'refresh');
      }
    }
  } 


  public function delete_user() {
    // Set validation rules
    $this->form_validation->set_rules('id', $this->lang->line('usr_id'), 'trim|required|min_length[1]|max_length[11]|integer|is_natural');

    if ($this->input->post()) {
      $id = $this->input->post('id');
    } else {
      $id = $this->uri->segment(3);
    }
        
    $data['page_heading'] = 'Borrar usuario';
    if ($this->form_validation->run() == FALSE) { // First load, or problem with form
      $data['query'] = $this->Users_model->get_user_details($id);
      $this->load->view('common/header');
      $this->load->view('common/admin_login_header');
      $this->load->view('users/delete_user', $data);
      $this->load->view('common/footer');
    } else {
      if ($this->Users_model->delete_user($id)) {
        //redirect('users');
        $this->session->set_flashdata('mensaje', 'Se borró el usuario correctamente.');
        redirect('users/delete_user', 'refresh');
      }else{
        $this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
        redirect('users/delete_user', 'refresh');
      }
    }
  }

  public function pwd_email() {
    $id = $this->uri->segment(3);
    send_email($data, 'reset');                
    redirect('users');
  }
}
