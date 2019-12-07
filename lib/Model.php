<?php
class Model {
	private $table;

	function __construct() {
		$this->db = new Database();
		$this->table = '';
	}

	public function setTable($table) {
		$this->table = $table;
	}

	public function getAllTable() {
		$query = $this->db->connect()->prepare('SELECT * FROM '.$this->table.' WHERE activo = 1');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>