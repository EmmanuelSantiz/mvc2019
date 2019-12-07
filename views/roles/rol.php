<h1 class="mt-5"><?php echo $parametros['id'] ? 'Editar' : 'Agregar'; ?> Rol</h1>
<form action="<?php echo base_url("roles/rol/").$parametros['id']; ?>" method="post">
	<div class="form-group">
    	<label for="nombre">Nombre</label>
      	<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $parametros['rol']['nombre']; ?>">
  	</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="descripcion">Descripcion</label>
      <textarea type="text" class="form-control" id="descripcion" name="descripcion"><?php echo $parametros['rol']['descripcion']; ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("roles/"); ?>'">Salir</button>
</form>