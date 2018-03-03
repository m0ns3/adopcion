<div class="container">
	<?php 
      $mensaje = $this->session->flashdata('mensaje');
      if ($mensaje) {
    ?>
        <div class="regEnviado animated fadeInDown" id="regEnviado"> 
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Muy bien!</strong> <p><?php echo $mensaje ?></p>
          </div> 
        </div>
    <?php
      }
      $error = $this->session->flashdata('error');
      if ($error) {
    ?>
        <div class="regEnviado animated fadeInDown" id="regEnviado"> 
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Uy!</strong> <p><?php echo $error ?></p>
          </div> 
        </div>
    <?php
      }
    ?>
	<div class="form">
		<div class="page-header">
  			<h2 class="text-center text-success" id="sombra"><?php echo 'Agregar mascota' ; ?></h2>
		</div> 

		<?php if (isset($success) && $success == true) : ?>
        <div class="alert alert-success">
          <strong><?php echo 'Éxito'; ?></strong> <?php echo 'Tu imagen fué subida'; ?> 
        </div>
      <?php endif ; ?>

      <?php if (isset($fail) && $fail == true) : ?>
        <div class="alert alert-danger">
          <strong><?php echo 'Error'; ?> </strong> <?php echo 'Debe cargar una imagen válida'; ?>
          <?php echo $fail ; ?> 
        </div>
      <?php endif ; ?>

	<div class="col-md-6">
		<?php echo form_open_multipart('mascotas/agregar_mascota','role="form" id="mascotaForm" class="form"') ; ?>
		<div class="form-group">
	      <?php echo form_error('pet_nombre'); ?>
	      <label for="pet_nombre">* Nombre de la mascota</label>
	      <?php echo form_input($pet_nombre, (isset($pet_nombre) ? $pet_nombre : '')); ?>
	    </div>

	    <div class="form-group">
	      <?php 
	      echo form_error('pet_especie'); ?>
	      <label id="pet_especie" for="pet_especie">* Especie</label>
	      <?php echo form_dropdown('pet_especie', $pet_especies,(isset($pet_especie) ? $pet_especie : ''),'class= "btn btn-block dropdown-toggle"'); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_estado'); ?>
	      <label id="pet_estado" for="pet_estado">* Estado</label>
	      <?php echo form_dropdown('pet_estado', $estados_opciones,(isset($pet_estado) ? $pet_estado : ''),'class= "btn btn-block dropdown-toggle"'); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_raza'); ?>
	      <label id="pet_raza" for="pet_raza">* Raza</label>
	      <?php echo form_dropdown('pet_raza', $razas_opciones,(isset($pet_raza) ? $pet_raza : ''),'class= "btn btn-block dropdown-toggle"'); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_sexo');?>
	      <label for="pet_sexo">* Sexo </label>
			<input type="radio" name="pet_sexo" id="pet_sexo_macho"  value="macho" checked="" />  Macho 
			<input type="radio" name="pet_sexo" id="pet_sexo_hembra" value="hembra" />  Hembra 		
	    </div>
		
		<div class="form-group">
	      <?php 
	      echo form_error('pet_edad'); ?>
	      <label id="pet_edad" for="pet_edad">* Edad</label>
	      <?php echo form_dropdown('pet_edad', $edades, (isset($pet_edad) ? $pet_edad : ''),'class= "btn btn-block dropdown-toggle"'); ?>
	    </div>

	    <div class="form-group">
	      <?php 
	      echo form_error('pet_tamanios'); ?>
	      <label id="pet_tamanios" for="pet_tamanios">Tamaño</label>
	      <?php echo form_dropdown('pet_tamanios', $tamanios, (isset($pet_tamanios) ? $pet_tamanios : ''),'class= "btn btn-block dropdown-toggle"'); ?>
	    </div>
	    <br \>
	    <div><a href="<?php echo base_url('mascotas/'); ?>" class=""><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></div>
	</div>

	<div class="col-md-6">
	    <div class="form-group">
	      <?php echo form_error('pet_color'); ?>
	      <label for="pet_color">Color de pelo</label>
	      <?php echo form_input($pet_color, (isset($pet_color) ? $pet_color : '')); ?>
	    </div>

		<div class="form-group">
	      <?php echo form_error('pet_esterilizado'); ?>
	      <label for="pet_esterilizado">Esterilizado/a</label>
	      <?php echo form_checkbox($pet_esterilizado); ?>
	    </div>	

	    <div class="form-group">
	      <?php echo form_error('pet_temperamento'); ?>
	      <label for="pet_temperamento">Temperamento</label>
	      <?php echo form_input($pet_temperamento, (isset($pet_temperamento) ? $pet_temperamento : '')); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_descripcion'); ?>
	      <label for="pet_descripcion">Descripción</label>
	      <div><?php echo form_textarea($pet_descripcion,(isset($pet_descripcion) ? $pet_descripcion : '')); ?></div>
	    </div>

	    <?php echo form_hidden('usr_id',$this->session->userdata('usr_id')); ?>

	    <div class="form-group">
	    	<label for="pet_foto">Foto</label>
	    	<?php echo form_upload($pet_foto); ?>
	    </div>
        
		<div>
			<?php echo form_submit('submit', 'Agregar mascota', 'class="btn btn-lg btn-success btn-block"'); ?>
		</div>
		<?php echo form_close() ;?>
  		<br>
  		<p>* Campos obligatorios</p>
	</div>
	</div>
</div>
