<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Me extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->helper('file'); // for html emails
    $this->load->helper('language');
    $this->load->model('Users_model');

    // Load language file
    $this->lang->load('es_admin', 'spanish');         
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');

    if ( ($this->session->userdata('logged_in') == FALSE) || 
         (!$this->session->userdata('usr_access_level') >= 2) ) {
            redirect('signin/signout');
    }           
  }
  
  public function index(){
    $data['usuario'] = $this->session->userdata('usr_email');
    $this->load->view('common/header');
    $this->load->view('common/login_header', $data);
    $this->load->view('common/footer');
  }
  public function editar_informacion(){
    // Set validation rules
    $this->form_validation->set_rules('usr_nombre', $this->lang->line('usr_fname'), 'trim|required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_apellido', $this->lang->line('usr_lname'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_email', $this->lang->line('usr_email'), 'trim|required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('usr_confirm_email', $this->lang->line('usr_confirm_email'), 'trim|required|min_length[1]|max_length[255]|valid_email|matches[usr_email]');
    $this->form_validation->set_rules('usr_direccion', $this->lang->line('usr_direccion'), 'trim|min_length[1]|max_length[255]');
    $this->form_validation->set_rules('usr_telefono', $this->lang->line('usr_telefono'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_celular', $this->lang->line('usr_celular'), 'trim|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('usr_otro', $this->lang->line('usr_otro'), 'trim|min_length[1]|max_length[255]');
    
    $data['id'] = $this->session->userdata('usr_id');
           
    $data['page_heading'] = 'Editar mi información personal';
    // Begin validation
    if ($this->form_validation->run() == FALSE) { // First load, or problem with form
      $query = $this->Users_model->get_user_details($data['id']);
      foreach ($query->result() as $row) {
        $usr_nombre = $row->usr_nombre;
        $usr_apellido = $row->usr_apellido;
        $usr_email = $row->usr_email;
        $usr_direccion = $row->usr_direccion;
        $usr_telefono = $row->usr_telefono;
        $usr_celular = $row->usr_celular;
        $usr_otro = $row->usr_otro;
      }

      $data['usr_nombre'] = array('name' => 'usr_nombre', 'class' => 'form-control', 'id' => 'usr_nombre', 'value' => set_value('usr_nombre', $usr_nombre), 'maxlength'   => '100', 'size' => '35');
      $data['usr_apellido'] = array('name' => 'usr_apellido', 'class' => 'form-control', 'id' => 'usr_apellido', 'value' => set_value('usr_apellido', $usr_apellido), 'maxlength'   => '100', 'size' => '35');
      $data['usr_email'] = array('name' => 'usr_email', 'class' => 'form-control', 'id' => 'email', 'value' => set_value('usr_email', $usr_email), 'maxlength'   => '100', 'size' => '35');
      $data['usr_confirm_email'] = array('name' => 'usr_confirm_email', 'class' => 'form-control', 'id' => 'usr_confirm_email', 'value' => set_value('usr_confirm_email', $usr_email), 'maxlength'   => '100', 'size' => '35');
      $data['usr_direccion'] = array('name' => 'usr_direccion', 'class' => 'form-control', 'id' => 'usr_direccion', 'value' => set_value('usr_direccion', $usr_direccion), 'maxlength'   => '100', 'size' => '35');
      $data['usr_telefono'] = array('name' => 'usr_telefono', 'class' => 'form-control', 'id' => 'usr_telefono', 'value' => set_value('usr_telefono', $usr_telefono), 'maxlength'   => '100', 'size' => '35');
      $data['usr_celular'] = array('name' => 'usr_celular', 'class' => 'form-control', 'id' => 'usr_celular', 'value' => set_value('usr_celular', $usr_celular), 'maxlength'   => '100', 'size' => '35');
      $data['usr_otro'] = array('name' => 'usr_otro', 'class' => 'form-control', 'id' => 'usr_otro', 'value' => set_value('usr_otro', $usr_otro), 'maxlength'   => '100', 'size' => '35');

      $data['usuario'] = $this->session->userdata('usr_email');
      $this->load->view('common/header');
      $this->load->view('common/login_header', $data);
      $this->load->view('users/me', $data);
      $this->load->view('common/footer');
    } else { // Validation passed, now escape the data
      $data = array(
          'usr_nombre' => $this->input->post('usr_nombre'),
          'usr_apellido' => $this->input->post('usr_apellido'),
          'usr_email' => $this->input->post('usr_email'),
          'usr_direccion' => $this->input->post('usr_direccion'),
          'usr_telefono' => $this->input->post('usr_telefono'),
          'usr_celular' => $this->input->post('usr_celular'),
          'usr_otro' => $this->input->post('usr_otro')
      );
      $id = $this->session->userdata('usr_id'); //defino de nuevo para pasarle al modelo
      if ($this->Users_model->process_update_user($id, $data)) {
          //redirect('users');
        $this->session->set_flashdata('mensaje', 'Se modificó su información correctamente.');
        redirect('me/editar_informacion', 'refresh');
      }else {
        $this->session->set_flashdata('error', 'Hubo un error, inténtalo nuevamente.');
        redirect('me/editar_informacion', 'refresh');
      }
    }
  }   

  public function change_password() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('usr_new_pwd_1', $this->lang->line('signin_new_pwd_pwd'), 'trim|required|min_length[5]|max_length[125]');
    $this->form_validation->set_rules('usr_new_pwd_2', $this->lang->line('signin_new_pwd_confirm'), 'trim|required|min_length[5]|max_length[125]|matches[usr_new_pwd_1]');
        
    if ($this->form_validation->run() == FALSE) {
      $data['usr_new_pwd_1'] = array('name' => 'usr_new_pwd_1', 'class' => 'form-control', 'type' => 'password', 'id' => 'usr_new_pwd_1', 'value' => set_value('usr_new_pwd_1', ''), 'maxlength'   => '100', 'size' => '35', 'placeholder' => $this->lang->line('signin_new_pwd_pwd'));
      $data['usr_new_pwd_2'] = array('name' => 'usr_new_pwd_2', 'class' => 'form-control', 'type' => 'password', 'id' => 'usr_new_pwd_2', 'value' => set_value('usr_new_pwd_2', ''), 'maxlength'   => '100', 'size' => '35', 'placeholder' => $this->lang->line('signin_new_pwd_confirm'));
      $data['submit_path'] = 'me/change_password';
      $data['usuario'] = $this->session->userdata('usr_email');
      
      $this->load->view('common/header');
      $this->load->view('common/login_header', $data);
      $this->load->view('users/change_password', $data);      
      $this->load->view('common/footer');
    } else {
      $hash = sha1($this->input->post('usr_new_pwd_1')); 

      $data = array(
        'usr_hash' => $hash,
        'usr_id' => $this->session->userdata('usr_id')
      );

      if ($this->Users_model->update_user_password($data)) {
        redirect('signin/signout');
      }
    }   
  }  
}