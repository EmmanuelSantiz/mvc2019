<h1 class="mt-5"><?php echo $parametros['id'] ? 'Editar' : 'Agregar'; ?> Permisos</h1>
<form action="<?php echo base_url("roles/permiso/").$parametros['id']; ?>" method="post">
  <div class="form-row">
    <div class="col-md-6 col-sm-6 form-group">
        <label for="email">Rol</label>
        <select name="id_rol" id="selectroles" class="form-control" <?php echo $parametros['id'] ? 'disabled="disabled"' : ''; ?> >
          <option value="">Seleccione</option>
          <?php
            if(count($parametros['roles']) > 0) {
              foreach($parametros['roles'] as $rol) {
                $selectR = isset($parametros['url_permisos']) ? $rol['id'] == $parametros['url_permisos']['id_rol'] ? 'selected="selected"' : '' : '';
                echo '<option value="'.$rol['id'].'" '.$selectR.'>'.$rol['nombre'].'</option>';
              }
            }
          ?> 
      </select>
    </div>
    <div class="form-group col-md-6 col-sm-6">
        <label for=""></label>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="borrar" name="borrar" <?php echo isset($parametros['url_permisos']['borrar']) ? $parametros['url_permisos']['borrar'] == 1 ? 'checked="checked"' : '' : ''; ?>>
          <label class="custom-control-label" for="borrar">Borrar</label>
        </div>

        <!-- Default inline 2-->
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="agregar" name="agregar" <?php echo isset($parametros['url_permisos']['agregar']) ? $parametros['url_permisos']['agregar'] == 1 ? 'checked="checked"' : '' : ''; ?>>
          <label class="custom-control-label" for="agregar">Agregar</label>
        </div>

        <!-- Default inline 3-->
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="ver" name="ver" <?php echo isset($parametros['url_permisos']['ver']) ? $parametros['url_permisos']['ver'] == 1 ? 'checked="checked"' : '' : ''; ?>>
          <label class="custom-control-label" for="ver">Ver</label>
        </div>

        <!-- Default inline 3-->
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="editar" name="editar" <?php echo isset($parametros['url_permisos']['editar']) ? $parametros['url_permisos']['editar'] == 1 ? 'checked="checked"' : '' : ''; ?>>
          <label class="custom-control-label" for="editar">Editar</label>
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("roles/permisos"); ?>'">Salir</button>
</form>