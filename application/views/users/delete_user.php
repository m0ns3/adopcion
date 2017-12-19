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
        <h2 class="text-center text-success" id="sombra"><?php echo $page_heading ; ?></h2>
        <p class="lead text-center"><?php echo $this->lang->line('delete_confirm_message');?></p>
        <?php echo form_open('users/delete_user'); ?>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
                <h2>Oops! Hubo un error:</h2>
                <p><?php echo validation_errors(); ?></p>
            </div>
        <?php endif; ?>
        <?php foreach ($query->result() as $row) : ?>
            <li><p><strong><?php echo $row->usr_nombre . ' ' . $row->usr_apellido; ?></strong></p></li>
            <br /><br />
            <?php echo form_submit('submit', $this->lang->line('common_form_elements_action_delete'), 'class="btn btn-success"'); ?>
            o <? echo anchor('users',$this->lang->line('common_form_elements_cancel'));?>
            <?php echo form_hidden('id', $row->usr_id); ?>
        <?php endforeach; ?>
    <?php echo form_close() ; ?>
    </div>
</div>    
<br /><br />