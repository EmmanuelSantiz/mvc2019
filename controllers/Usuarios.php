<?php
class Usuarios extends Controller {
	function __construct() {
		parent::__construct();
		$this->loadModel('Usuarios');
	}

	public function index() {
		if(!$this->helper->validar('ver'))
			redirect();
			
		$this->Model->setTable('usuarios');
		$respuesta['usuarios'] = $this->Model->getAllTable();
		$this->view->template('usuarios/index', $respuesta);
	}

	public function editar() {
		if(!$this->helper->validar('ver') || !$this->helper->validar('editar'))
			redirect();
		
		$respuesta['id'] = $this->getId();
		$respuesta['usuario'] = $this->Model->get($this->getId());
		
		$this->view->template('usuarios/editar', $respuesta);

		if ($_POST) {
			$update = $_POST;
			$update['id'] = $this->getId();
			$respuesta['data'] = $this->Model->editar($update);
			redirect('usuarios/');
		}
	}

	public function borrar() {
		if(isAjax()) {
			$respuesta['post'] = $_POST;
			$respuesta['data'] = $this->Model->borrarLogico($respuesta['post']['id']);
			//$respuesta['data'] = $_POST['tipo'] == 0 ? $this->Model->borrarLogico($respuesta['post']['id']) : $this->Model->borrar($respuesta['post']['id']);
			echo retornoJson($respuesta);
		}
	}

	///////////ROLES
	public function roles() {
		if(!$this->helper->validar('ver'))
			redirect();

		$respuesta = array();
		$respuesta['usuarios_roles'] = $this->Model->getUserwhitRoles();
		$this->view->template('usuarios/roles/index', $respuesta);
	}
	

	public function usuarios_roles() {
		if(!$this->helper->validar('ver'))
			redirect();

		$this->Model->setTable('usuarios_roles');
		$respuesta['id'] = $this->getId();
		$respuesta['usuario_rol'] = $this->Model->getTable($this->getId());

		//Get roles
		$this->Model->setTable('roles');
		$respuesta['roles'] = $this->Model->getAllTable();

		//Get users
		$this->Model->setTable('usuarios');
		$respuesta['usuarios'] = $this->Model->getAllTable();
		$this->view->template('usuarios/roles/usuario_rol', $respuesta);

		if ($_POST) {
			$update = $_POST;
			$update['id'] = $this->getId();
			$respuesta['data'] = $this->Model->setUsuarioRol($update);
			redirect('usuarios/roles/');
		}
	}

	public function borrarUR() {
		if(isAjax()) {
			$respuesta['post'] = $_POST;
			$respuesta['data'] = $this->Model->borrarLogicoUR($respuesta['post']['id']);
			//$respuesta['data'] = $_POST['tipo'] == 0 ? $this->Model->borrarLogico($respuesta['post']['id']) : $this->Model->borrar($respuesta['post']['id']);
			echo retornoJson($respuesta);
		}
	}
}

?>