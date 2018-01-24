<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Prueba</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

	<!-- Bootstrap theme -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
  
</head>
<body>
	<div class="form">
		<h2><?php echo $page_heading; ?></h2>

		<?php if (isset($success) && $success == true) : ?>
        <div class="alert alert-success">
          <strong><?php echo 'Éxito'; ?></strong> <?php echo 'Tu imagen fué subida'; ?> 
        </div>
      <?php endif ; ?>

      <?php if (isset($fail) && $fail == true) : ?>
        <div class="alert alert-danger">
          <strong><?php echo 'Error'; ?> </strong> <?php echo 'La imagen no puede ser guardada en este momento'; ?>
          <?php echo $fail ; ?> 
        </div>
      <?php endif ; ?>

		<?php echo form_open_multipart('mascotas/agregar_mascota','role="form" id="mascotaForm" class="form"') ; ?>

		<div class="form-group">
	      <?php echo form_error('pet_nombre'); ?>
	      <label for="pet_nombre">* Nombre de la mascota</label>
	      <?php echo form_input('pet_nombre'); ?>
	    </div>

	    <div class="form-group">
	      <?php 
	      $especies = array('perro' => 'perro',
	      					'gato'  => 'gato'
	      					);
	      echo form_error('pet_especie'); ?>
	      <label id="pet_especie" for="pet_especie">* Especie</label>
	      <?php echo form_dropdown('pet_especie', $especies); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_estado'); ?>
	      <label id="pet_estado" for="pet_estado">* Estado</label>
	      <?php echo form_dropdown('pet_estado', $estados_opciones); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_raza'); ?>
	      <label id="pet_raza" for="pet_raza">* Raza</label>
	      <?php echo form_dropdown('pet_raza', $razas_opciones); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_sexo'); ?>
	      <label for="pet_sexo">* Sexo</label>
			<input type="radio" name="pet_sexo" id="pet_sexo_macho"  value="macho" checked="" /> Macho
			<input type="radio" name="pet_sexo" id="pet_sexo_hembra" value="hembra" /> Hembra		
	    </div>
		
		<div class="form-group">
	      <?php 
	      $edades = array('cachorro' => 'Cachorro',
	      				'joven'    => 'Joven',
	      				'adulto'   => 'Adulto',
	      				'anciano'  => 'Anciano'
	      				);
	      echo form_error('pet_edad'); ?>
	      <label id="pet_edad" for="pet_edad">* Edad</label>
	      <?php echo form_dropdown('pet_edad', $edades); ?>
	    </div>

	    <div class="form-group">
	      <?php 
	      $tamanios = array('muychico' => 'Muy chico',
	      				   'chico'    => 'Chico',
	      				   'mediano'  => 'Mediano',
	      				   'grande'   => 'Grande',
	      				   'muygrande'=> 'Muy grande'
	      				);
	      echo form_error('pet_tamanios'); ?>
	      <label id="pet_tamanios" for="pet_tamanios">Tamaño</label>
	      <?php echo form_dropdown('pet_tamanios', $tamanios); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_color'); ?>
	      <label for="pet_color">Color de pelo</label>
	      <?php echo form_input('pet_color'); ?>
	    </div>

		<div class="form-group">
	      <?php echo form_error('pet_esterilizado'); ?>
	      <label for="pet_esterilizado">Esterilizado/a</label>
	      <?php echo form_checkbox('pet_esterilizado', 'S'); ?>
	    </div>	

	    <div class="form-group">
	      <?php echo form_error('pet_temperamento'); ?>
	      <label for="pet_temperamento">Temperamento</label>
	      <?php echo form_input('pet_temperamento'); ?>
	    </div>

	    <div class="form-group">
	      <?php echo form_error('pet_descripcion'); ?>
	      <label for="pet_descripcion">Descripción</label>
	      <div><?php echo form_textarea('pet_descripcion'); ?></div>
	    </div>

	    <?php echo form_hidden('usr_id','1'); ?>

	    <div class="form-group">
	    	<label for="pet_foto">Foto</label>
	    	<?php echo form_upload('pet_foto'); ?>
	    </div>
        
		<div>
			<?php echo form_submit('submit', 'Agregar mascota', 'class="btn btn-lg btn-success btn-block"'); ?>
		</div>
		<?php echo form_close() ; ?>
  		<br>
  		<p>* Campos obligatorios</p>
	</div>

	<footer>
			<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages
		load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
	</footer>
</body>

</html>