<?php
/**
 * 
 */
class UsuariosModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}

	/*public function getAll() {
		$query = $this->db->connect()->prepare('SELECT * FROM usuarios Where activo = 1');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}*/

	public function get($id) {
		$query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE id = :id');
		$query->execute(array('id' => $id));
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function borrar($id) {
		$query = $this->db->connect()->prepare('DELETE FROM usuarios WHERE id = :id');
		return $query->execute(array('id' => $id));
	}

	public function borrarLogico($id) {
		$query = $this->db->connect()->prepare('UPDATE usuarios SET activo = 0 WHERE id = :id');
		$query->execute(array('id' => $id));
		return $query->rowCount();
	}

	public function editar($array = array()) {
		if($array['id']) {
			$query = $this->db->connect()->prepare('UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id');
			$query->execute(array('id' => $array['id'], 'nombre' => $array['nombre'], 'email' => $array['email']));
			return $query->rowCount();
		} else {
			$query = $this->db->connect()->prepare('INSERT INTO usuarios(id, nombre, password, activo, email, created) VALUES(null, :nombre, :password, 1, :email, now())');
			$query->execute(array('nombre' => $array['nombre'], 'password' => MD5($array['password']), 'email' => $array['email']));
			return $this->db->connect()->lastInsertId();
		}
	}

	public function setUsuarioRol($array = array()) {
		if($array['id']) {
			$query = $this->db->connect()->prepare('UPDATE usuarios_roles SET id_usuario = :id_usuario, id_rol = :id_rol WHERE id = :id');
			$query->execute(array('id' => $array['id'], 'id_usuario' => $array['id_usuario'], 'id_rol' => $array['id_rol']));
			return $query->rowCount();
		} else {
			$query = $this->db->connect()->prepare('INSERT INTO usuarios_roles(id, id_usuario, id_rol) VALUES (null, :id_usuario, :id_rol)');
			$query->execute(array('id_usuario' => $array['id_usuario'], 'id_rol' => $array['id_rol']));
			return $this->db->connect()->lastInsertId();
		}
	}

	public function getUserwhitRoles() {
		$query = $this->db->connect()->prepare('SELECT ur.id as id, u.nombre AS nombre_usuario, r.nombre AS nombre_rol FROM usuarios_roles ur LEFT JOIN usuarios u ON u.id = ur.id_usuario LEFT JOIN roles r ON r.id = ur.id_rol WHERE u.activo = 1 AND ur.activo = 1');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function borrarLogicoUR($id) {
		$query = $this->db->connect()->prepare('UPDATE usuarios_roles SET activo = 0 WHERE id = :id');
		$query->execute(array('id' => $id));
		return $query->rowCount();
	}

	/*public function insert($array) {
		try {
			$query = $this->db->connect()->prepare('INSERT INTO cat_usuarios(id_usuario, char_usuario, char_password, date_fecha) VALUES(null, :char_usuario, :char_password, :date_fecha)');
			$query->execute(array('char_usuario' => $array['char_usuario'], 'char_password' => MD5($array['char_password']), 'date_fecha' => date('Y-m-d')));
			if ($query) {
				return $this->db->connect()->lastInsertId();
			} else {
				return 'Error';
			}
			
		} catch(PDOExecption $e) {
			return $e->getMessage();
		}
	}*/
}
?>