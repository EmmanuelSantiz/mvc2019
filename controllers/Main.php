<?php
class Main extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if (!isset($_SESSION['id'])) {
			$this->view->render('login');
		} else {
			$this->view->template('main/index');
		}
	}
}
?>