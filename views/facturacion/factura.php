<div class="container">
	<div class="panel panel-info">
		<!-- pagado', 'cancelado', 'pendiente agregar en input-->
		<div class="panel-heading">
			<h4><i class="glyphicon glyphicon-edit"></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
				  		<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  		</div>
				  		<div class="modal-body">
						<form class="form-horizontal" id="contenidoDinamico"></form>
					<div id="loader" style="position: absolute; text-align: center; top: 55px; width: 100%;"></div><!-- Carga gif animado -->
					<div class="outer_div">			<div class="table-responsive">
			  <table class="table">
				<tbody>
			  </tbody></table>
			</div>
			</div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>
			<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required="">
				</div>
			  </div>
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email">
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direccion" name="direccion" maxlength="255"></textarea>
				  
				</div>
			  </div>
			  
			  <!--div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required="">
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected="">Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div-->
			 
			 
			 
			
		  </form></div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  
		</div>
	  </div>
	</div>
			<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required="" maxlength="255"></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Unidad de Medida</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" name="UM" id="UM">
				</div>
			  </div>
			  <div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio de venta del producto" required="" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
		  </form></div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos_productos">Guardar datos</button>
		  </div>
		  
		</div>
	  </div>
	</div>
				<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm ui-autocomplete-input" id="nombre_cliente" placeholder="Selecciona un cliente" required="" autocomplete="off">
					  <input id="id_cliente" name="id_cliente" type="hidden">	
				  </div>
				  <label for="condiciones" class="col-md-1 control-label">Estado</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="estado" name="estado">
									<option value="pendiente">Pendiente</option>
									<option value="pagado">Pagado</option>
									<option value="cancelado">Cancelado</option>
								</select>
							</div>
				 </div>
						<div class="form-group row">
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date('d/m/Y'); ?>" readonly="">
							</div>
							<label for="condiciones" class="col-md-1 control-label">Pago</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="condiciones" name="condiciones">
									<option value="1">Efectivo</option>
									<option value="2">Cheque</option>
									<option value="3">Transferencia bancaria</option>
									<option value="4">Crédito</option>
								</select>
							</div>
						</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="allprodcuts">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="button" class="btn btn-default" id="save">
						  <span class="glyphicon glyphicon-floppy-disk"></span> Guardar factura
						</button>
					</div>	
				</div>
				<div class="col-md-12" id="cart">
				</div>
			</form>	
			
			<div class="clearfix"></div>
				<div class="guardar_factura" style="margin-top:10px"></div><!-- Carga los datos ajax -->	
			
		<div id="resultados" class="col-md-12" style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			</div>	
		 </div>
	</div>
<script type="text/javascript">
	var carrito = [];
	var subtotal = 0;
	var total = 0;
	$(document).ready(function() {
		console.log('jquery ready!');
		$('#guardar_datos_productos').click(function(event) {
			var url = '<?php echo base_url('facturacion/add_producto'); ?>';
			$.post(url,{data: $('#guardar_producto').serialize()}, function(data) {
				if(data.data == 0) {
					$('#guardar_producto')[0].reset();
					$('#nuevoProducto').modal('hide');
				}
			});
			event.preventDefault();
		});
		$('#allprodcuts').click(function() {
			getAllProducts();
		});
		$('#cart').on('click', '.btnDelete', function() {
			carrito.splice($(this).data('indice'), 1);
			printCart();
		});
		$('#contenidoDinamico').on('click', '.addElement', function () {
			var data = {id: $(this).data('id'),
						nombre: $(this).data('nombre'),
						precio: parseFloat($(this).data('precio')),
						cantidad: parseFloat($('#cantProd'+$(this).data('id')).val()),
						subtotal: $('#cantProd'+$(this).data('id')).val() * parseFloat($(this).data('precio'))
					};

			if(carrito.length > 0) {
				var bsq = buscar(data);
				//console.log(bsq)
				if(bsq >= 0) {
					carrito[bsq].cantidad = carrito[bsq].cantidad + parseFloat($('#cantProd'+carrito[bsq].id).val());
					carrito[bsq].subtotal = parseFloat(carrito[bsq].cantidad) * parseFloat(carrito[bsq].precio);
				} else {
					carrito.push(data);
				}
			} else {
				carrito.push(data);
			}
			printCart();
			console.log(carrito)
		});
		$('#save').click(function() {
			var datas = {
				subtotal: subtotal,
				total: total,
				estado: $('#estado').val(),
				detalle: carrito,
			};
			//console.log(datas);
			$.post("<?php echo base_url('facturacion/add_invoice/') ?>", {data: datas}, function(data) {
				console.log(data)
			});
		});
	});

	var buscar = (array) => {
		var encontrado = -1;
		for(var i in carrito) {
			if(carrito[i].id == array.id) {
				encontrado = i;
			}
		}
		return encontrado;
	}
	function getAllProducts() {
		var url = '<?php echo base_url('facturacion/get_producto'); ?>';
		$.post(url,function(data) {
			console.log(data)
			if(data.data) {
				//console.log(createElement(data.data))
				$('#contenidoDinamico').html('').html(createElement(data.data));
			}
		});
		var createElement = (array) => {
			//console.log('Creando tabla')
			var table = '<div class="outer_div"><table class="table table-responsive">';
			if(array.length > 0) {
				for(var i in array) {
					table += '<tr>';
					table += '<td>'+array[i].id+'</td>';
					table += '<td>'+array[i].nombre+'</td>';
					table += '<td class="col-xs-1 col-md-1"><div class="pull-right">'+
						'<input type="text" class="form-control" style="text-align:right" value="1" id="cantProd'+array[i].id+'">'+
						'</div></td>';
					table += '<td>'+array[i].precio+'</td>';
					table += '<td class="text-center"><a class="btn btn-info addElement" href="javascript:void(0);" data-id='+array[i].id+' data-nombre="'+array[i].nombre+'" data-precio="'+array[i].precio+'"><i class="glyphicon glyphicon-plus"></i></a></td>';
					table += '</tr>';
				}
			}
			table += '</table></div>';
			return table;
		}
	}
	function printCart() {
		var cart = '<div class="outer_div"><table class="table table-responsive">';
		cart += '<thead><tr><th>Id</th><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>SubTotal</th><th></th></tr></thead><tbody>';
		subtotal = 0;
		total = 0;
		if(carrito.length > 0) {
			for(var i in carrito) {
				subtotal = parseFloat(subtotal) + parseFloat(carrito[i].subtotal);
				total = parseFloat(total) + parseFloat(carrito[i].subtotal);
				cart += '<tr>';
				cart += '<td>'+carrito[i].id+'</td>';
				cart += '<td>'+carrito[i].nombre+'</td>';
				cart += '<td class="col-xs-1 col-md-1"><div class="pull-right">'+
						'<input type="text" class="form-control" style="text-align:right" value="'+carrito[i].cantidad+'" readonly="readonly">'+
						'</div></td>';
				cart += '<td>'+carrito[i].precio+'</td>';
				cart += '<td>'+carrito[i].subtotal+'</td>';
				cart += '<td><button class="btn btn-danger btnDelete" data-indice='+i+' type="button">X</button></td>';
				cart += '</tr>';
			}
		}
		cart += '<tr><td colspan="4">SubTotal</td><td>'+subtotal+'</td></tr>'+
							'<tr><td colspan="4">Total</td><td>'+total+'</td></tr>';
		cart += '</tbody></table></div>';
		$('#cart').html('').html(cart);
	}
</script>