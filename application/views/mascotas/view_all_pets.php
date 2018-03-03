<h2 class="text-center text-success" id="sombra"><strong>Panel Mascotero</strong></h2>
<a href="<?php echo base_url('mascotas/agregar_mascota'); ?>" class="btn btn-info pull-right"><span class="glyphicon glyphicon-plus"></span> Agregar mascota</a>
<?php if ($query == FALSE) { ?><h3><strong>No hay mascotas publicadas.</strong></h3>
<?php }else{ ?>

<div>
<section class="main container">
    	<div id="lista-mascotas" class="row">
    		<section class="posts col-md-9">
				
			<?php foreach ($query->result() as $row) : ?>
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

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Descripción: </strong><?php echo $row->descripcion; ?></p></li><br />

					<li id="sinpuntos"><p class="post-contenido text-justify"><strong>Publicado: </strong><?php if ($row->publicado == 1){
						echo "Si";
						}else{
							echo "No";
						} ?></p></li><br />

					<a href="#" class="btn btn-sm btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
					<a href="#" class="btn btn-sm btn-success pull-right">Ver más</a>
				</ul>
			  				
    			</article>
	        
		    <?php endforeach ; ?>
			
<?php } ?>
</section>
</div>