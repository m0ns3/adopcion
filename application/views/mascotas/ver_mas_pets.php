    <div class="modal fade" id="ver_mas" tabindex="-1" role="dialog" arialabelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnModalCerrar">&times;</button>
            <h4 class="modal-title"><?php echo $nombreMascota; ?></h4>
          </div>
          <div class="modal-body lead">
            <div id="lista-mascotas" class="row">
              <section class="posts col-md-9">
                <article class="post clearfix">
                  <img id="" src="<?php echo $foto;?>" class="img-thumbnail" >
                  <ul id="pets">
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Id. de la Mascota: </strong><?php echo $idMascota; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Estado: </strong><?php echo $estado; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Especie: </strong><?php echo $especie; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Raza: </strong><?php echo $raza; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Sexo: </strong><?php echo $genero; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Edad: </strong><?php echo $edad; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Tamaño: </strong><?php echo $tamanio; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Esterilizado: </strong><?php echo $esterilizado; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Color: </strong><?php echo $color; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Temperamento: </strong><?php echo $temperamento; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Descripción: </strong><?php echo $descripcion; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Fecha de alta: </strong><?php echo $fecha; ?></p></li><br />
                    <li id="sinpuntos"><p class="post-contenido text-justify"><strong>Correo de responsable: </strong><?php echo $usr_email; ?></p></li><br />
                </article>
              </section>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModal">Aceptar</button>
          </div>
        </div>
      </div>  
    </div>