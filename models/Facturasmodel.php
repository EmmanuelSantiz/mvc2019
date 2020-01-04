<?php
/**
 * 
 */
class FacturasModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
		$query = $this->db->connect()->prepare('SELECT * FROM factura');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get($id) {
		$respuesta = array();
		$query = $this->db->connect()->prepare('SELECT *, DATE_FORMAT(fecha, "%d/%m/%Y") AS fecha FROM factura WHERE id = :id');
		$query->execute(array('id' => $id));
		if($query) {
			$respuesta = $query->fetch(PDO::FETCH_ASSOC);
			$query_detail = $this->db->connect()->prepare('SELECT df.*, p.nombre FROM detalle_factura df LEFT JOIN productos p ON p.id = df.id_producto WHERE df.id_factura = :id');
			$query_detail->execute(array('id' => $id));
			$respuesta['detalle'] = $query_detail->fetchAll(PDO::FETCH_ASSOC);
		}
		return $respuesta;
	}

	public function add_productos($array = array()) {
		if(isset($array['id'])) {
			$query = $this->db->connect()->prepare('UPDATE productos SET nombre = :nombre, UM = :UM, precio = :precio WHERE id = :id');
			$query->execute(array('id' => $array['id'], 'nombre' => $array['nombre'], 'UM' => $array['UM'], 'precio' => $array['precio']));
			return $query->rowCount();
		} else {
			$query = $this->db->connect()->prepare('INSERT INTO productos(id, nombre, precio, UM, activo) VALUES(null, :nombre, :precio, :UM, 1)');
			$query->execute(array('nombre' => $array['nombre'], 'precio' => $array['precio'], 'UM' => $array['UM']));
			return $this->db->connect()->lastInsertId();
		}
	}

	public function getProducts() {
		$query = $this->db->connect()->prepare('SELECT * FROM productos Where activo = 1');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function add_invoice($array = array()) {
		if(isset($array['id'])) {

		} else {
			$query = $this->db->connect()->prepare('INSERT INTO factura(id, fecha, total, subtotal, estado, cliente) VALUES(null, :fecha, :total, :subtotal, :estado, :cliente)');
			$query->execute(array('fecha' => date('Y-m-d'), 'total' => $array['total'], 'subtotal' => $array['subtotal'], 'estado' => $array['estado'], 'cliente' => 1));
			return  $this->db->connect()->lastInsertId();
		}
	}

	public function add_invoice_detail($array = array()) {
		if(isset($array['id'])) {

		} else {
			$query = $this->db->connect()->prepare('INSERT INTO detalle_factura(id, id_factura, id_producto, cantidad, subtotal, precio) VALUES(null, :id_factura, :id_producto, :cantidad, :subtotal, :precio)');
			$query->execute(array('id_factura' => $array['id_factura'], 'id_producto' => $array['id_producto'], 'subtotal' => $array['subtotal'], 'cantidad' => $array['cantidad'], 'precio' => $array['precio']));
			return  $this->db->connect()->lastInsertId();
		}
	}
}
?>