<h2 class="text-center text-success" id="sombra"><strong><?php echo $page_heading ; // esto sale del controlador users?></strong></h2>
<div class="table-responsive">
<table class="table table-bordered table-hover" id="tabla-usuarios">
    <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
	      <th>Acciones</td>                    
        </tr>
    </thead>	
    <tbody>
    	<?php if ($query->num_rows() > 0) : ?>
			<?php foreach ($query->result() as $row) : ?>
		        <tr class="centrar-texto">
		          <td><?php echo $row->usr_id ; ?></td>
		          <td><?php echo $row->usr_nombre ; ?></td>
		          <td><?php echo $row->usr_apellido ; ?></td>
		          <td><?php echo $row->usr_email ; ?></td>
		          <td><?php echo anchor('users/edit_user/'.
		            $row->usr_id,'<span class="glyphicon glyphicon-pencil"></span>'.' '.$this->lang->line('common_form_elements_action_edit')) . 
		            ' ' . anchor('users/delete_user/'. $row->usr_id,'<span class="glyphicon glyphicon-remove"></span>'.' '.$this->lang->line('common_form_elements_action_delete')) ; ?>
		      	  </td>
		        </tr>	        
		    <?php endforeach ; ?>
		<?php else : ?>
	        <tr>
	          <td colspan="5" class="info">No hay usuarios para mostrar</td>
	        </tr>			
		<?php endif; ?>
	</tbody>
</table>
</div>