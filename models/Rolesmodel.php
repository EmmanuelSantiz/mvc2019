<?php

class RolesModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}

	/*public function getAll() {
		$query = $this->db->connect()->prepare('SELECT * FROM roles Where activo = 1');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}*/

	public function get($id) {
		$query = $this->db->connect()->prepare('SELECT * FROM roles WHERE id = :id AND activo = 1');
		$query->execute(array('id' => $id));
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function rol($array = array()) {
		if($array['id']) {
			$query = $this->db->connect()->prepare('UPDATE roles SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
			$query->execute(array('id' => $array['id'], 'nombre' => $array['nombre'], 'descripcion' => $array['descripcion']));
			return $query->rowCount();
		} else {
			$query = $this->db->connect()->prepare('INSERT INTO roles(id, nombre, descripcion, activo, created) VALUES(null, :nombre, :descripcion, 1, now())');
			$query->execute(array('nombre' => $array['nombre'], 'descripcion' => $array['descripcion']));
			return $this->db->connect()->lastInsertId();
		}
	}

	public function borrar($id) {
		$query = $this->db->connect()->prepare('DELETE FROM roles WHERE id = :id');
		return $query->execute(array('id' => $id));
	}

	public function borrarLogico($id) {
		$query = $this->db->connect()->prepare('UPDATE roles SET activo = 0 WHERE id = :id');
		$query->execute(array('id' => $id));
		return $query->rowCount();
	}
}
?>