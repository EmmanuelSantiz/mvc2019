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
		if($_SESSION['permisos']['editar'] == 0 || $_SESSION['permisos']['agregar'] == 0) {
			redirect('usuarios/');
		}
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

	///////////ROLES
	public function roles() {
		if (!isset($_SESSION['id'])) {
			redirect();
		} else {
			$respuesta = array();
			//$this->Model->setTable('usuarios_roles');
			$respuesta['usuarios_roles'] = $this->Model->getUserwhitRoles();
			//dd($respuesta);
			$this->view->template('usuarios/roles/index', $respuesta);
		}
	}

	public function usuarios_roles() {
		$this->Model->setTable('usuarios_roles');
		$respuesta['id'] = $this->getId();
		$respuesta['usuario_rol'] = $this->Model->getTable($this->getId());

		//Get roles
		$this->Model->setTable('roles');
		$respuesta['roles'] = $this->Model->getAllTable();

		//Get users
		$this->Model->setTable('usuarios');
		$respuesta['usuarios'] = $this->Model->getAllTable();
		//dd($respuesta);
		
		$this->view->template('usuarios/roles/usuario_rol', $respuesta);

		if ($_POST) {
			$update = $_POST;
			$update['id'] = $this->getId();
			//dd($update);
			$respuesta['data'] = $this->Model->setUsuarioRol($update);
			$_SESSION['flash'] = 'Exito, Se guardaron los cambios';
			redirect('usuarios/roles/');
			//dd($respuesta['data']);
			/*if($respuesta['data'] > 0)
				redirect('usuarios/');
			else {
				$this->view->error = true;
				redirect('usuarios/editar/'.$update['id']);
			}*/
		}
	}
}

?>