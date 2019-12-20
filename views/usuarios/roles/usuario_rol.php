<?php
?><h1 class="mt-5"><?php echo $parametros['id'] ? 'Editar' : 'Agregar'; ?> Rol a Usuario</h1>
<form action="<?php echo base_url("usuarios/usuarios_roles/").$parametros['id']; ?>" method="post" id="formPost">
	<div class="form-group">
    	<label for="nombre">Usuario</label>
      	<select name="id_usuario" id="selectusuarios" class="form-control">
          <option value="">Seleccione</option>
         <?php
         if(count($parametros['usuarios']) > 0) {
          foreach($parametros['usuarios'] as $usr) {
            $select = isset($parametros['usuario_rol']) ? $usr['id'] == $parametros['usuario_rol']['id_usuario'] ? 'selected="selected"' : '' : '';
            echo '<option value="'.$usr['id'].'" '.$select.'>'.$usr['nombre'].'</option>';
          }
         }
         ?> 
        </select>
  	</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Rol</label>
      <select name="id_rol" id="selectroles" class="form-control">
        <option value="">Seleccione</option>
         <?php
         if(count($parametros['roles']) > 0) {
          foreach($parametros['roles'] as $rol) {
            $selectR = isset($parametros['usuario_rol']) ? $rol['id'] == $parametros['usuario_rol']['id_rol'] ? 'selected="selected"' : '' : '';
            echo '<option value="'.$rol['id'].'" '.$selectR.'>'.$rol['nombre'].'</option>';
          }
         }
         ?> 
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="guardarRoles">Guardar</button>
  <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("usuarios/roles"); ?>'">Salir</button>
</form>