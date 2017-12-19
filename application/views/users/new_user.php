<div class="container" id="register">
  <div class="loginmodal-container">
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
<?php echo validation_errors() ; ?>
<div class="page-header">
  <h2 class="text-center text-success" id="sombra"><?php echo $page_heading ; ?></h2>
</div> 
<div class="span8"> 
  <?php echo form_open('users/new_user','role="form" id="registrarseForm" class="form"') ; ?>

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
      <label for="usr_email"><?php echo '* '. $this->lang->line('usr_email');?></label>
      <?php 
        $data = array(
                  'name' => 'usr_email',
                  'id' => 'email'
                  );
                  
      echo form_input($data); 
      ?>
    </div>   
    
    <div class="form-group">
      <label for="usr_confirm_email"><?php echo '* '. $this->lang->line('usr_confirm_email');?></label>
      <?php echo form_input($usr_confirm_email); ?>
    </div>   

    <div class="form-group">
      <label for="usr_direccion"><?php echo $this->lang->line('usr_direccion');?></label>
      <?php echo form_input($usr_direccion); ?>
    </div>  

    <div class="form-group">
      <label for="usr_telefono"><?php echo $this->lang->line('usr_telefono');?></label>
      <?php echo form_input($usr_telefono); ?>
    </div>          

    <div class="form-group">
      <label for="usr_celular"><?php echo $this->lang->line('usr_celular');?></label>
      <?php echo form_input($usr_celular); ?>
    </div> 

    <div class="form-group">
      <label for="usr_otro"><?php echo $this->lang->line('usr_otro');?></label>
      <?php echo form_input($usr_otro); ?>
    </div>                  

    <div class="form-group">
      <label for="usr_access_level"><?php echo '* '. $this->lang->line('usr_access_level');?></label>
      <?php echo form_dropdown('usr_access_level', $usr_access_level, '2'); ?>
    </div>  


  <div class="form-group">
    <label><?php echo '* ' . $this->lang->line('usr_is_active');?></label>
    <?php  
        $activo = array('type' =>'radio',
                        'name' => 'usr_is_active',
                        'id' => 'radioActivo-1',
                        'value' =>1,
                        );
        $inactivo = array('type' =>'radio',
                          'name' => 'usr_is_active',
                          'id' => 'radioInactivo-0', 
                          'value' =>0
                        );
    ?> 

    <label for="radioActivo-1" class="radio-inline">
      <? echo form_input($activo); ?> Activo
    </label>
    <label for="radioInactivo-0" class="radio-inline">
      <? echo form_input($inactivo); ?> Inactivo
    </label>
  
  </div>      

  <div class="form-group">
    <button type="submit" class="btn btn-success"><?php echo $this->lang->line('common_form_elements_go');?></button>  o <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
  </div>
<?php echo form_close() ; ?>
  </div>
  <br>
  <p>* Campos Obligatorios</p>
</div>
</div>
