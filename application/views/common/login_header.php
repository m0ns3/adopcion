<div class="container">
<nav class="navbar navbar-custom" id="navbaruser">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#usernav">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
	 <?php $atributos = 'class="navbar-brand"';
     echo anchor('bienvenido/usuarios', '<span class="glyphicon glyphicon-user"></span>'.' '.$usuario, $atributos); ?> 
  </div>
  <!-- inicia menú -->
  <div id="usernav" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li><?php echo anchor('mascotas/', '<span class="glyphicon glyphicon-heart"></span> Mis mascotas publicadas'); ?></li>
      <li><?php echo anchor('me/editar_informacion', '<span class="glyphicon glyphicon-pencil"></span> Editar mi información'); ?></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <?php echo anchor('signin/signout', '<span class="glyphicon glyphicon-off"></span>'.' '.$this->lang->line('top_nav_signout')); ?>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
</div>