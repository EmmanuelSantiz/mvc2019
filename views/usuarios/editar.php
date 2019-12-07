<h1 class="mt-5"><?php echo $parametros['id'] ? 'Editar' : 'Agregar'; ?> Usuario</h1>
<form action="<?php echo base_url("usuarios/editar/").$parametros['id']; ?>" method="post">
	<div class="form-group">
    	<label for="nombre">Nombre</label>
      	<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $parametros['usuario']['nombre']; ?>">
  	</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $parametros['usuario']['email']; ?>">
    </div>
  </div>
  <?php if(!$parametros['id']) { ?>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php echo $parametros['usuario']['password']; ?>">
    </div>
  </div>
  <?php } ?>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("usuarios/"); ?>'">Salir</button>
</form>
<?php
/*echo $error.'<br>';
echo $this->error;
if($error) {
  echo 'No se genero la actualizacion!!';
}*/
?>