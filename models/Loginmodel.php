<?php
/**
 * 
 */
class LoginModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function get($array = array()) {
		$query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :nombre AND password = :password');
		$query->execute(array('nombre' => $array['nombre'], 'password' => MD5($array['password'])));
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($array) {
		try {
			$query = $this->db->connect()->prepare('INSERT INTO usuarios(id, nombre, password, activo, email, created) VALUES(null, :nombre, :password, 1, :email, now())');
			$query->execute(array('nombre' => $array['nombre'], 'password' => MD5($array['password']), 'email' => $array['email']));
			if ($query) {
				return $this->db->connect()->lastInsertId();
			} else {
				return 'Error';
			}
			
		} catch(PDOExecption $e) {
			return $e->getMessage();
		}
	}
}
?>