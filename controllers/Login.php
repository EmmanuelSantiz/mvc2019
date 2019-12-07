<?php
class Login extends Controller {
	function __construct() {
		parent::__construct();
		$this->loadModel('Login');
	}

	public function index() {
		if(isAjax()) {
			parse_str($_POST['data'], $respuesta['post']);
			$respuesta['data'] = $this->Model->insert($respuesta['post']);
			echo retornoJson($respuesta['data']);
			exit();
		}

		if ($_POST) {
			$data = $this->Model->get($_POST);
			if($data) {
				$_SESSION['id'] = $data['id'];
				$_SESSION['nombre'] = $data['nombre'];
			} else {
				$_SESSION['temp'] = true;
			}
			redirect();
			//header('Location: ' . base_url());
		}
	}

	public function logout() {
		session_destroy();
		redirect();
		//header('Location: ' . base_url());
	}
}
?>