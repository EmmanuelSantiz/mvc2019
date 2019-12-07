<?php

/**
 * Errores
 */
class Errores extends Controller {
	
	function __construct() {
		parent::__construct();
		$this->view->mensaje = 'Error al Cargar!!';
		$this->view->render('error/index');
	}
}
?>