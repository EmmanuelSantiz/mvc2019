<?php
class Roles extends Controller {

	function __construct() {
		parent::__construct();
		$this->loadModel('Roles');
	}

	public function index() {
		if (!isset($_SESSION['id'])) {
			$this->view->render('login');
		} else {
			//$respuesta['roles'] = $this->Model->getAll();
			$this->Model->setTable('roles');
			$respuesta['roles'] = $this->Model->getAllTable();
			$this->view->template('roles/index', $respuesta);
		}
	}

	public function rol() {
		$respuesta['id'] = $this->getId();
		$respuesta['rol'] = $this->Model->get($this->getId());
		
		$this->view->template('roles/rol', $respuesta);

		if ($_POST) {
			$rol = $_POST;
			$rol['id'] = $this->getId();

			$respuesta['data'] = $this->Model->rol($rol);
			redirect('roles/');
		}
	}

	public function borrar() {
		if(isAjax()) {
			$respuesta['post'] = $_POST;
			$respuesta['data'] = $_POST['tipo'] == 0 ? $this->Model->borrarLogico($respuesta['post']['id']) : $this->Model->borrar($respuesta['post']['id']);
			echo retornoJson($respuesta);
		}
	}

	//////////////////////PERMISOS
	public function permisos() {
		if (!isset($_SESSION['id'])) {
			$this->view->render('login');
		} else {
			//$respuesta['roles'] = $this->Model->getAll();
			//$this->Model->setTable('url_permisos');
			$respuesta['url_permisos'] = $this->Model->getRoleswhitPermis();
			$this->view->template('roles/permisos/index', $respuesta);
		}
	}

	public function permiso() {
		$this->Model->setTable('url_permisos');
		$respuesta['id'] = $this->getId();
		$respuesta['url_permisos'] = $this->Model->getTable($this->getId());

		//Get roles
		$this->Model->setTable('roles');
		$respuesta['roles'] = $this->Model->getAllTable();

		$this->view->template('roles/permisos/permiso', $respuesta);

		if ($_POST) {
			$rol = $_POST;
			$rolSave = array();
			foreach($rol as $rl => $key) {
				if($rl == 'id_rol') {
					$rolSave[$rl] = $key;
					continue;
				}
				
				$key = $key == 'on' ? 1 : 0;
				$rolSave[$rl] = $key;
			}
			$rolSave['id'] = $this->getId();
			//dd(array($rol, $rolSave));

			$respuesta['data'] = $this->Model->rolPermiso($rolSave);
			redirect('roles/permisos');
		}
	}
}
?>