<h1 class="mt-5">Lista de Usuarios con Roles</h1>
<div class="table-responsive">
	<button type="button" class="btn btn-success" onclick=location.href="<?php echo base_url("usuarios/usuarios_roles/"); ?>">Agregar</button>
	<table class="table table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>
					Usuario
				</td>
				<td>
					Rol
				</td>
			</tr>
		</thead>
		<tbody>
			<?php
			crear_tabla($parametros['usuarios_roles']);
			?>
		</tbody>
	</table>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">BORRAR</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
      	<p class="text-center">¿Esta seguro que desea eliminar este registro?</p>
      	<input type="hidden" name="id" id="id" value="">
      	<input type="hidden" name="typo" id="tipo" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="proceso" onclick="proceso()">Procesar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var urlDelete = '<?php echo base_url("usuarios/borrar/"); ?>';
	function update(id) {
		window.location.href = '<?php echo base_url("usuarios/usuarios_roles/"); ?>'+id;
	}
	
	function borrar(id, tipo = 0) {
		$('#id').val('').val(id);
		$('#tipo').val('').val(tipo);
		$('#myModal').modal('show')
	}

	function proceso() {
		$.post(urlDelete, {id: $('#id').val(), tipo: $('#tipo').val()}, function(data) {
			if (data.data) {
				window.location.reload(true);
			}
		});
	}
</script>
<?php
function crear_tabla($array = array()) {
	if(count($array) > 0) {
		foreach($array as $key) {
			echo '<tr>';
			echo '<td>'.$key['id'].'</td>';
			echo '<td>'.$key['nombre_usuario'].'</td>';
			echo '<td>'.$key['nombre_rol'].'</td>';
			echo '<td><button type="button" class="btn btn-warning" onclick="update('.$key['id'].')">Update</button><button type="button" class="btn btn-danger" onclick="borrar('.$key['id'].',1)">Delete</button><button type="button" class="btn btn-danger" onclick="borrar('.$key['id'].')">DeleteLogico</button></td>';
			echo '</tr>';
		}
	} else {
		echo '<tr class="danger"><td colspan="3" class="text-center" style="font-size: 13px;">SIN DATOS!!</td></tr>';
	}
}
?>