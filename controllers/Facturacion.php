<?php
class Facturacion extends Controller {
	function __construct() {
		parent::__construct();
		$this->loadModel('Facturas');
	}

	public function index() {
		if(!$this->helper->validar('ver'))
			redirect();

		$respuesta['facturas'] = $this->Model->getAll();
		$this->view->template('facturacion/index', $respuesta);
	}

	public function factura() {
		if(!$this->helper->validar('ver'))
			redirect();

		$this->view->template('facturacion/factura');
	}

	public function add_producto() {
		if(isAjax()) {
			parse_str($_POST['data'], $respuesta['post']);
			$respuesta['data'] = $this->Model->add_productos($respuesta['post']);
			//$respuesta['post'] = $_POST;
			echo retornoJson($respuesta);
		}
	}

	public function get_producto() {
		if(isAjax()) {
			$respuesta['data'] = $this->Model->getProducts();
			//$respuesta['post'] = $_POST;
			echo retornoJson($respuesta);
		}
	}

	public function add_invoice() {
		if(isAjax()) {
			$respuesta['post'] = $_POST;
			$detalle = $respuesta['post']['data']['detalle'];
			unset($respuesta['post']['data']['detalle']);
			$factura = $respuesta['post']['data'];
			$this->Model->add_invoice($factura);
			$this->Model->setTable('factura');
			$respuesta['data'] = $this->Model->getLastId();
			if($respuesta['data']['id']) {
				foreach($detalle as $detail) {
					$this->Model->add_invoice_detail(array(
						'id_factura' => $respuesta['data']['id'],
						'id_producto' => $detail['id'],
						'cantidad' => $detail['cantidad'],
						'subtotal' => $detail['subtotal'],
					));
				}
			}
			echo retornoJson($respuesta);
		}
	}

	public function test() {

	}
}
?>