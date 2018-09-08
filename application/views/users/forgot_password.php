<div class="container" id="forgot_password">
  <div class="loginmodal-container">
    <?php if (isset($login_fail)) : ?>
      <div class="alert alert-danger"><?php echo $this->lang->line('admin_login_error') ; ?></div>
    <?php endif ; ?>

    <?php 
      $aviso = $this->session->flashdata('aviso');
      if ($aviso) {
    ?>
        <div class="regEnviado animated fadeInDown" id="regEnviado"> 
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p><?php echo $aviso ?></p>
          </div> 
        </div>
      <?php
      }
      ?>

      <?php echo validation_errors(); ?>
      <?php echo form_open('password/forgot_password', 'id="registrarseForm" class="form-signin" role="form"') ; ?>
        <h2 class="form-signin-heading"><?php echo $this->lang->line('forgot_pwd_header') ; ?></h2>
        <br />
        <div>
          <p class="lead text-center"><?php echo $this->lang->line('forgot_pwd_instruction') ;?></p>
        </div>
        <div class="form-group col-md-12">
          <?php echo form_input(array('name' => 'usr_email', 'type' => 'email', 'class' => 'form-control', 'placeholder' => $this->lang->line('admin_login_email'),'id' => 'usr_email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?>
        </div>
        
        <br />
        <div class="form-group col-md-12">
          <button class="btn btn-lg btn-success btn-block" type="submit"><?php echo $this->lang->line('common_form_elements_go') ; ?></button>
        </div>
        
        <br />
      <?php echo form_close() ; ?>
  </div>
</div>
