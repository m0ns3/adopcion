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
  public function mostrar_todas_razas() {
    $q = $this->db->get('razas');


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
  public function mostrar_mascotas($user) { //mostrar mascotas por usuario
    $this->db->where('usr_id', $user);
    $r = $this->db->get('mascotas');
    
    if ($r->num_rows() > 0) {
      return $r;
    } else {
      return false;
    }
  }
  public function mostrar_mascota($id) { //mostrar mascota por id de mascota
    $this->db->where('idMascota', $id);
    $r = $this->db->get('mascotas');

    if ($r->num_rows() > 0) {
      return $r;
    } else {
      return false;
    }
  }

  public function buscar_mascotas($pet) {
    $i = 0;
    foreach ($pet as $key => $value) { //cuento los filtros de busqueda y guardo en un array
      if ($value != '') {
        ++$i;
        $filtros[$key] = $value;
      }
    }


    // armo las query en base a la cant de filtros de busqueda
    if ($i == 1) { 

      foreach ($filtros as $key => $value) {
         $query = 'SELECT * FROM mascotas WHERE '. $key . ' LIKE ' . "'".$value."'";
      }
      
    }elseif ($i > 1) {

      $key1 = key($filtros); // obtiene la clave de un array en la posicion actual

      $value1 = array_shift($filtros); //Quita un elemento del principio del array

      $query1 = 'SELECT * FROM mascotas WHERE '. $key1 . ' LIKE ' . "'".$value1."'";
      $query2 = '';
      foreach ($filtros as $k => $v) {
        $query2 = $query2.' AND ' . $k . ' LIKE ' . "'".$v."'";
      }

      $query= $query1.$query2;
     
    }

// echo $i;
// echo "<br>";
// echo $query;
// exit;
if ($i > 0) {
  $res = $this->db->query($query);


  if ($res->num_rows() > 0 ) {
    return $res;
  
  }
}else{
  echo "no hay filtros";
 
}

   

    
  } // cierra funcion

}
