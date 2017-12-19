<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<meta name="description" content="Sitio web dedicado a la adopción de animales domésticos">
	<meta name="author" content="Margott33">
	<link rel="shortcut icon" href="<?php echo base_url('img/favicon.ico'); ?>">
	<title>Adopciones de mascotas</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/estilos.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/animate.css');?>">

	<!-- Bootstrap theme -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">

	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

  
</head>
<!-- END header.php -->

<body>
<!-- <div class="container theme-showcase" role="main"> -->
	<header>
	<div class="container" id="header">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Desplegar / Ocultar Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand animated tada" href="./" id="logo">Rabitos</a>	
        </div>
        <!-- inicia menú -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">Inicio</a></li>
            <li><a href="#">Adoptar mascota</a></li>
            <li><a href="#">Buscar mascota</a></li>
            <li><a href="#">Donar</a></li>
            <li><a href="#">Contacto</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acerca de <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Las adopciones</a></li>
                <li><a href="#">La importancia de la esterilizacion</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Los rabitos</li>
                <li><a href="#">Quienes somos</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>

          <?php //si está logeado no muestra las opciones de registarse e ingresar
            if ($this->session->userdata('logged_in') == FALSE) { ?>
             <ul class="nav navbar-nav navbar-right" id="loginmenu">
              <li><?php echo anchor('register', 'Registrarse'); ?></li>
              <li><?php echo anchor('signin', 'Ingresar'); ?></li>
             </ul> <?php
            }
           ?>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </div> <!--/.cierra div header -->
   </header>

