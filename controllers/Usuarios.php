<?php
class Usuarios extends Controller {
	function __construct() {
		parent::__construct();
		$this->loadModel('Usuarios');
	}

	public function index() {
		if (!isset($_SESSION['id'])) {
			redirect();
		} else {
			//$respuesta['usuarios'] = $this->Model->getAll();
			$this->Model->setTable('usuarios');
			$respuesta['usuarios'] = $this->Model->getAllTable();
			//dd($respuesta);
			$this->view->template('usuarios/index', $respuesta);
		}
	}

	public function editar() {
		$respuesta['id'] = $this->getId();
		$respuesta['usuario'] = $this->Model->get($this->getId());
		
		$this->view->template('usuarios/editar', $respuesta);

		if ($_POST) {
			$update = $_POST;
			$update['id'] = $this->getId();
			$respuesta['data'] = $this->Model->editar($update);
			redirect('usuarios/');
			//dd($respuesta['data']);
			/*if($respuesta['data'] > 0)
				redirect('usuarios/');
			else {
				$this->view->error = true;
				redirect('usuarios/editar/'.$update['id']);
			}*/
		}
	}

	public function borrar() {
		if(isAjax()) {
			$respuesta['post'] = $_POST;
			//$respuesta['data'] = $_POST['tipo'] == 0 ? $this->Model->borrarLogico($respuesta['post']['id']) : $this->Model->borrar($respuesta['post']['id']);
			echo retornoJson($respuesta);
		}
	}
}

?>