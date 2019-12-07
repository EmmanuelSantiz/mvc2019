<?php
require_once 'controllers/Errores.php';
class App {
	private $url = '';
	function __construct() {
		$this->url = isset($_GET['url']) ? $_GET['url'] : null;
		$this->url = rtrim($this->url, '/');
		$this->url = explode('/', $this->url);
		if (empty($this->url[0])) {
			require_once 'controllers/main.php';
			$controller = new Main();
			$controller->index();
			return false;
		}
		
		$archivoController = 'controllers/'.$this->url[0].'.php';
		if (file_exists($archivoController)) {
			require_once $archivoController;
			$controller = new $this->url[0];
			if (isset($this->url[1])) {
				if (isset($this->url[2])) {
					$controller->setId($this->url[2]);
				}
					
				$controller->{$this->url[1]}();
			} else {
				$controller->index();
			}
		} else {
			$controller = new Errores();
		}
		$this->site_url = implode('/', $this->url);
	}
}
?>