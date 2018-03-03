<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mascotas_model extends CI_Model {
  function __construct() {
    parent::__construct();
   }

  public function mostrar_estados() {
    // paso los valores que están en la BD para mostrarlos en la vista, en el dropdown
  	$query = $this->db->query("SELECT descripcion FROM Estados");
       foreach ($query->result() as $row){
         $est[] = $row->descripcion;
       }
    return $est; 
  }
  public function mostrar_todos_estados() {
    $q = $this->db->get('estados');


    if ($q->num_rows() > 0) {
      return $q;
    } else {
      return false;
    }
   
  }
  public function mostrar_razas() {
  	$query = $this->db->query("SELECT descripcion FROM Razas");
      foreach ($query->result() as $row){
        $raz[] = $row->descripcion;
      }
    return $raz;
  }

  public function agregar_mascota($mascota) {
    if ($this->db->insert('Mascotas', $mascota)) {
      return true;
    } else {
      return false;
    }
  }
  public function mostrar_mascotas($user) {
    $this->db->where('usr_id', $user);
    $r = $this->db->get('mascotas');

    if ($r->num_rows() > 0) {
      return $r;
    } else {
      return false;
    }
  }


}
