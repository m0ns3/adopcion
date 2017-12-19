<div class="container" id="register">
  <div class="loginmodal-container">
	<div class="page-header">
	  <h2 class="text-center text-success" id="sombra"><?php echo $page_heading ; ?></h2>
	</div> 
		<p class="lead"><?php echo $this->lang->line('usr_form_instruction_edit');?></p>

	<div class="span8"> 
		<?php echo form_open('users/edit_user','role="form" id="registrarseForm" class="form"') ; ?>
	    <div class="form-group">
	      <?php echo form_error('usr_nombre'); ?>
	      <label for="usr_nombre"><?php echo '* '. $this->lang->line('usr_fname');?></label>
	      <?php echo form_input($usr_nombre); ?>
	    </div>
	    <div class="form-group">
	      <?php echo form_error('usr_apellido'); ?>
	      <label for="usr_apellido"><?php echo $this->lang->line('usr_lname');?></label>
	      <?php echo form_input($usr_apellido); ?>
	    </div>  
	       
	    <div class="form-group">
	      <?php echo form_error('usr_email'); ?>	    	
	      <label for="usr_email"><?php echo '* '. $this->lang->line('usr_email');?></label>
		  <?php echo form_input($usr_email); ?>
	    </div>   
	    <div class="form-group">
	    	<?php echo form_error('usr_confirm_email'); ?>	
	      <label for="usr_confirm_email"><?php echo '* '. $this->lang->line('usr_confirm_email');?></label>
	      <?php echo form_input($usr_confirm_email); ?>
	    </div>   
	    <div class="form-group">
	    	<?php echo form_error('usr_direccion'); ?>
	      <label for="usr_direccion"><?php echo $this->lang->line('usr_direccion');?></label>
	      <?php echo form_input($usr_direccion); ?>
	    </div>  
	    <div class="form-group">
	    	<?php echo form_error('usr_telefono'); ?>
	      <label for="usr_telefono"><?php echo $this->lang->line('usr_telefono');?></label>
	      <?php echo form_input($usr_telefono); ?>
	    </div>
	    <div class="form-group">
	    	<?php echo form_error('usr_celular'); ?>
	      <label for="usr_celular"><?php echo $this->lang->line('usr_celular');?></label>
	      <?php echo form_input($usr_celular); ?>
	    </div> 
	    <div class="form-group">
	    	<?php echo form_error('usr_otro'); ?>
	      <label for="usr_otro"><?php echo $this->lang->line('usr_otro');?></label>
	      <?php echo form_input($usr_otro); ?>
	    </div>         
	          
	    <div class="form-group">
	    	<?php echo form_error('usr_access_level'); ?>
	      <label id="usr_access_level" for="usr_access_level"><?php echo '* '. $this->lang->line('usr_access_level');?></label>
	      <?php echo form_dropdown('usr_access_level', $usr_access_level_options, $usr_access_level); ?>
	    </div>  

	    <div class="form-group">
	    	<?php echo form_error('usr_is_active'); ?>
	      <label for="usr_is_active"><?php echo '* '. $this->lang->line('usr_is_active');?></label>
			<?php 
				if ($usr_is_active == 1) {
			?>
					<input type="radio" name="usr_is_active" id="radioActivo-1"  value="1" checked="" /> Activo
					<input type="radio" name="usr_is_active" id="radioInactivo-0" value="0" /> Inactivo	
			<?php	}else{
			?>
					<input type="radio" name="usr_is_active" id="radioActivo-1"  value="1"  /> Activo
					<input type="radio" name="usr_is_active" id="radioInactivo-0" value="0" checked="" /> Inactivo	
			<?php	} 
			 ?>			
	    </div>

	    <?php echo form_hidden($id); ?>

	    <div class="form-group">
	      <button type="submit" class="btn btn-success"><?php echo $this->lang->line('common_form_elements_go');?></button> O <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
	    </div>
		<?php echo form_close() ; ?>
	</div>
	<br>
  	<p>* Campos Obligatorios</p>

</div>
</div>
