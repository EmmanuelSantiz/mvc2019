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
	            	<a class="nav-link" href="<?php echo base_url("usuarios/"); ?>">Usuarios</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="<?php echo base_url("roles/"); ?>">Roles</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="<?php echo base_url("login/logout"); ?>">Salir</a>
	            </li>
	          </ul>
	        </div>
	      </nav>
	</header>
<main role="main" class="container">
    <br>