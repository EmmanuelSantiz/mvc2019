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

	public function rolPermiso($array = array()) {
		if($array['id']) {
			/*$query = $this->db->connect()->prepare('UPDATE roles SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
			$query->execute(array('id' => $array['id'], 'nombre' => $array['nombre'], 'descripcion' => $array['descripcion']));
			return $query->rowCount();*/
		} else {
			$query = $this->db->connect()->prepare('INSERT INTO url_permisos(id, id_rol, borrar, agregar, ver, editar, activo) VALUES(null, :id_rol, :borrar, :agregar, :ver, :editar, 1)');
			$query->execute(array('id_rol' => $array['id_rol'],
				'borrar' => (isset($array['borrar'])?$array['borrar']:0),
				'agregar' => (isset($array['agregar'])?$array['agregar']:0),
				'ver' => (isset($array['ver'])?$array['ver']:0),
				'editar' => (isset($array['editar'])?$array['editar']:0)
			));
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

	public function getRoleswhitPermis() {
		$query = $this->db->connect()->prepare('SELECT up.id, r.nombre, CASE WHEN up.borrar = 1 THEN "Si" ELSE "No" END AS borrar, CASE WHEN up.agregar = 1 THEN "Si" ELSE "No" END AS agregar, CASE WHEN up.ver = 1 THEN "Si" ELSE "No" END AS ver, CASE WHEN up.editar = 1 THEN "Si" ELSE "No" END AS editar FROM url_permisos up LEFT JOIN roles r ON r.id = up.id_rol ');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>