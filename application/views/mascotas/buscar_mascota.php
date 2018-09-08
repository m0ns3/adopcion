<div class="container">
<div class="form">
    <div class="page-header">
        <h2 class="text-center text-success" id="sombra"><?php echo 'Buscar mascota' ; ?></h2>
    </div>
    
    <?php echo validation_errors() ; ?>
    <div class="col-md-6">
      <?php echo form_open('mascotas/buscar_mascota','role="form" id="mascotaForm" class="form"') ; ?>
      <div class="form-group">
        <?php echo form_error('pet_nom'); ?>
        <label id="pet_nom" for="pet_nom">Nombre de la mascota</label>
        <input type="text" class="form-control" name="pet_nom" id="pet_nom" autofocus>
      </div>

      <div class="form-group">
        <label id="pet_especie" for="pet_especie">Especie</label>
        <select name="pet_especie" id="pet_especie" class= "btn btn-block dropdown-toggle">
          <option value="">Especie</option>
          <?php foreach ($pet_especies as $e => $value) {
            echo '<option value="'.$e.'">'.$value.'</option>'; 
          }  ?>
        </select>
      </div>

      <div class="form-group">
        <label id="pet_estado" for="pet_estado">Estado</label>
        <select name="pet_estado" id="pet_estado" class= "btn btn-block dropdown-toggle">
          <option value="">Estado</option>
          <?php $i = 0;
          foreach ($estados_opciones as $e => $value) {
            $i++;
            echo '<option value="'.$i.'">'.$value.'</option>';
             
          }  ?>
        </select>
      </div>

      <div class="form-group">
        <label id="pet_raza" for="pet_estado">Raza</label>
        <select name="pet_raza" id="pet_raza" class= "btn btn-block dropdown-toggle">
          <option value="">Raza</option>
          <?php $j=0;
          foreach ($razas_opciones as $e => $value) {
            $j++;
            echo '<option value="'.$j.'">'.$value.'</option>'; 
          }  ?>
        </select>
      </div>

      <div class="form-group">
        <?php echo form_error('pet_sexo');?>
        <label for="pet_sexo">Sexo </label>
        <input type="radio" name="pet_sexo" id="pet_sexo_macho"  value="macho" />  Macho 
        <input type="radio" name="pet_sexo" id="pet_sexo_hembra" value="hembra" />  Hembra    
      </div>

      <div class="form-group">
        <label id="pet_edad" for="pet_edad">Edad</label>
        <select name="pet_edad" id="pet_edad" class= "btn btn-block dropdown-toggle">
          <option value="">Edad</option>
          <?php foreach ($edades as $e => $value) {
            echo '<option value="'.$e.'">'.$value.'</option>'; 
          }  ?>
        </select>
      </div>

      <div class="form-group">
        <label id="pet_tamanios" for="pet_tamanios">Tamaño</label>
        <select name="pet_tamanios" id="pet_tamanios" class= "btn btn-block dropdown-toggle">
          <option value="">Tamaño</option>
          <?php foreach ($tamanios as $e => $value) {
            echo '<option value="'.$e.'">'.$value.'</option>'; 
          }  ?>
        </select>
      </div>

      <div><a href="<?php echo base_url('mascotas/'); ?>" class=""><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></div>
      <br \>
    </div>
      

    <div class="col-md-6">

      <div class="form-group">
        <?php echo form_error('pet_color'); ?>
        <label id="pet_color" for="pet_color">Color de pelo</label>
        <input type="text" class="form-control" name="pet_color" id="pet_color" >
      </div>

      <div class="form-group">
        <?php echo form_error('pet_esterilizado'); ?>
        <label id="pet_esterilizado" for="pet_esterilizado">Esterilizado</label>
        <input type="checkbox" name="pet_esterilizado" id="pet_esterilizado" value="s">
      </div>

      <div class="form-group">
        <?php echo form_error('pet_temperamento'); ?>
        <label id="pet_temperamento" for="pet_temperamento">Temperamento</label>
        <input type="text" class="form-control" name="pet_temperamento" id="pet_temperamento" >
      </div>

      <div>
        <?php echo form_submit('submit', 'Buscar mascota', 'class="btn btn-lg btn-success btn-block"'); ?>
      </div>
      <?php echo form_close() ;?>
      <br>
    </div>
  </div>
</div>

</div>