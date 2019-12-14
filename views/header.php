<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	        <a class="navbar-brand" href="#">PHP desde 0</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarCollapse">
	          <ul class="navbar-nav mr-auto">
	            <li class="nav-item active">
	              <a class="nav-link" href="<?php echo base_url(); ?>">Inicio</a>
	            </li>
	            <li class="nav-item">
	            	<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="usuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
	            	<div class="dropdown-menu dropdown-primary" aria-labelledby="usuarios">
			          <a class="dropdown-item" href="<?php echo base_url("usuarios/"); ?>">Lista de Usurios</a>
			          <a class="dropdown-item" href="<?php echo base_url("usuarios/roles/"); ?>">Lista de Roles</a>
			        </div>
	            </li>
	            <li class="nav-item">
	            	<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="usuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Roles</a>
	            	<div class="dropdown-menu dropdown-primary" aria-labelledby="usuarios">
			          <a class="dropdown-item" href="<?php echo base_url("roles/"); ?>">Lista de Roles</a>
			          <a class="dropdown-item" href="<?php echo base_url("roles/permisos/"); ?>">Lista de Permisos</a>
			        </div>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="<?php echo base_url("login/logout"); ?>">Salir</a>
	            </li>
	          </ul>
	        </div>
	      </nav>
	</header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
	function message(tipo = null, msj = null) {
		var div = jQuery('<div role="alert" style="width:50%;position:absolute;z-index:1;"></div>');
		div.addClass('alert alert-'+(tipo?tipo:'success')+' alert-dismissible fade show');
		var button = jQuery('<button data-dismiss="alert" aria-label="Close"></button>');
		button.addClass('close');
		button.attr('type', 'button');
		button.append('<span aria-hidden="true">&times;</span');
		if(msj) {
			div.append(msj);
		}
		div.append(button);
		return div;
	}
</script>
<main role="main" class="container">