<div class="container" id="register">
  <div class="loginmodal-container">

    <?php 
      $correcto = $this->session->flashdata('correcto');
      if ($correcto) {
    ?>
        <div class="regEnviado animated fadeInDown" id="regEnviado"> 
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Muy bien!</strong> <p><?php echo $correcto ?></p>
          </div> 
        </div>
      <?php
      }
      ?>

  <?php echo validation_errors(); ?>
  <?php echo form_open('register/index', 'role="form" id="registrarseForm" class="form-signin"') ; ?>        
    <h2 class="form-signin-heading"><?php echo $this->lang->line('register_page_title'); ?></h2>
    
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_nombre" id="usr_nombre" placeholder="* <?php echo $this->lang->line('register_first_name'); ?>" required autofocus>
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_apellido" id="usr_apellido" placeholder="<?php echo $this->lang->line('register_last_name'); ?>" >
    </div>
    <div class="form-group col-md-12">
      <input type="email" class="form-control" name="usr_email" id="usr_email" placeholder="* <?php echo $this->lang->line('register_email'); ?>" required>
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_direccion" id="usr_direccion" placeholder="<?php echo $this->lang->line('register_direccion'); ?>">
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_telefono" id="usr_telefono" placeholder="<?php echo $this->lang->line('register_telefono'); ?>" >
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_celular" id="usr_celular" placeholder="<?php echo $this->lang->line('register_celular'); ?>" >
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="usr_otro" id="usr_otro" placeholder="<?php echo $this->lang->line('register_otro'); ?>" title="Red social u otro contacto." >
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input id="terms" name="terms" type="checkbox" required>
            <p>He leído y aceptado los términos y condiciones del <a href="#">Acuerdo del usuario y Política de Privacidad</a>.<p>
        </label>
      </div>
    </div>
    <div class="form-group col-md-12">
      <?php echo form_submit('submit', 'Registrarme', 'id="modal1" class="btn btn-lg btn-success btn-block"'); ?>
    </div>
<?php echo form_close() ; ?>
  <br>
  <p>* Campos obligatorios</p>
</div>
</div>