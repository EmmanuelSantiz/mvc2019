<?php
class Helper {
	private $permisos;
	function __construct() {
		$this->permisos = $_SESSION;
	}

	public function validar($tipo) {
		if (!isset($this->permisos['id'])) {
			return false;
		} else {
			return $this->permisos['permisos'][$tipo];
		}
	}
}
?>
