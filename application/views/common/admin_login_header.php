<div class="container">
<nav class="navbar navbar-custom" id="navbaruser">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#usernav">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <?php echo anchor('users', '<span class="glyphicon glyphicon-th"></span> Administración','class="navbar-brand"') ; ?>  
  </div>
  <!-- inicia menú -->
  <div id="usernav" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <?php if ($this->session->userdata('usr_access_level') == 1) : ?>
        <li <?php if ($this->uri->segment(1) == 'mascotas') {echo 'class="active"';} ; ?>><?php echo anchor('mascotas', '<span class="glyphicon glyphicon-heart"></span> Mascotas') ; ?></li>
        <li <?php if ($this->uri->segment(1) == 'adopciones') {echo 'class="active"';} ; ?>><?php echo anchor('adopciones', '<span class="glyphicon glyphicon-star"></span> Adopciones') ; ?></li>
        <li <?php if ($this->uri->segment(2) == 'listado_usuarios') {echo 'class="active"';} ; ?>><?php echo anchor('users/listado_usuarios', '<span class="glyphicon glyphicon-user"></span>'. ' '. $this->lang->line('top_nav_users')) ; ?></li>
        <li <?php if ($this->uri->segment(2) == 'new_user') {echo 'class="active"';} ; ?>><?php echo anchor('users/new_user', '<span class="glyphicon glyphicon-plus-sign"></span>'. ' '. $this->lang->line('top_nav_new')) ; ?></li>    
      <?php else : // este apartado se ejecuta si el nivel de acceso de usuario no es 1?>
  
      <?php endif ; ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php if ($this->session->userdata('logged_in') == TRUE) : ?>
      <li><?php echo anchor('signin/signout', '<span class="glyphicon glyphicon-off"></span>'.' '.$this->lang->line('top_nav_signout')); ?></li>
      <?php endif ; ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
</div>