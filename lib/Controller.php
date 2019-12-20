<?php
class Controller {
	private $id;
	
	function __construct() {
		$this->view = new view();
		$this->helper = new helper();
	}

	function loadModel($model) {
		$url = 'models/'.$model.'model.php';
		if (file_exists($url)) {
			require $url;
			$modelName = $model.'Model';
			$this->Model = new $modelName();
		}
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}
}
?>