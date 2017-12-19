<div class="container-fluid" id="login"> 
  <div class="loginmodal-container"> 
    <?php if (isset($login_fail)) : ?>
      <div class="alert alert-danger"><?php echo $this->lang->line('admin_login_error') ; ?></div>
    <?php endif ; ?>
    <?php if (isset($mensaje)) : ?>
      <div class="alert alert-danger"><p><?php echo "Usuario inexistente." ; ?></p></div>
    <?php endif ; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('signin/index') ; ?>
 
    <h2 class="form-signin-heading"><?php echo $this->lang->line('admin_login_header') ; ?></h2><br>
    
     <input type="email" name="usr_email" class="form-control" placeholder="<?php echo $this->lang->line('admin_login_email') ; ?>" required autofocus>
     <input type="password" name="usr_password" class="form-control" placeholder="<?php echo $this->lang->line('admin_login_password') ; ?>" required>
     <button class="btn btn-lg btn-success btn-block" type="submit"><?php echo $this->lang->line('admin_login_signin') ; ?></button>

    <div class="login-help"> 
      <?php echo anchor('password',$this->lang->line('signin_forgot_password')); ?>
    </div> 
      <?php echo form_close() ; ?>
  </div> 
</div>
