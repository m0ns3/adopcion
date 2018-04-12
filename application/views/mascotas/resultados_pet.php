<div class="container">
	
	<h2 class="text-center text-success" id="sombra"><strong>Resultados de la búsqueda</strong></h2>
	<div><a href="<?php echo base_url('mascotas/buscar_mascota'); ?>" class=""><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></div>
	<?php if (isset($not_found)) { ?>
    <div class="alert alert-danger animated fadeInDown">No hay resultados para esta búsqueda.</div>
  <?php }else{ ?>
<section class="main container">
    	<div id="resultados-pet" class="row">
    		<section class="posts col-md-9">
				
			<?php foreach ($encontrados->result() as $row) : ?>
				<article class="post clearfix">
				
					<a href="#" class="thumb pull-left">
						<img id="" src="<?php if (($row->foto) != NULL){echo base_url().$row->foto;}else{echo '../img/dog.jpg';}  ?>" class="img-thumbnail" >
					</a>
					
					
					<h4 class="post-tittle">
						<a href="#"><strong><?php echo $row->nombreMascota; ?></strong></a>
					</h4>
					
					<ul id="pets">
					
					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Especie: </strong><?php echo $row->especie; ?></p></li><br />
			
					<li id="sinpuntos"><p id="estado_desc" class="post-contenido text-justify"><strong>Estado: </strong><?php foreach ($est->result() as $fila) {
							if ($fila->idEstados == $row->estados_idEstados) {
									$estado = $fila->descripcion; 
							}
					}
					if (isset($estado)) {
						echo $estado;
					}else{
						echo "No definido";
					}


					?></p></li><br />

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Edad: </strong><?php echo $row->edad; ?></p></li><br />

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Sexo: </strong><?php echo $row->genero; ?></p></li><br />

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Temperamento: </strong><?php echo $row->temperamento; ?></p></li><br />

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Color: </strong><?php echo $row->color; ?></p></li><br />

					
					<a href="#" class="btn btn-sm btn-success pull-right">Ver más</a>
				</ul>
			  				
    			</article>
	        
		    <?php endforeach ; ?>
			
</section>
<?php } ?>
</div>
