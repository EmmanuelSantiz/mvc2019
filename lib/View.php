<?php
class View {
	
	public $parametros;
	public $error;

	function __construct() {
		$this->parametros = array();
		$this->error = false;
	}
	
	public function render($nombre, $parametros = array(), $error = false) {
		$this->parametros = $parametros;
		$this->error = $error;
		require 'views/'.$nombre.'.php';
	}
	
	public function template($nombre = null, $parametros = array(), $error = false) {
		$this->parametros = $parametros;
		$this->error = $error;
		require 'views/header.php';
		if($nombre)
			require 'views/'.$nombre.'.php';
		require 'views/footer.php';
	}
}
?>