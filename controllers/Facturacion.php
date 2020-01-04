<?php
require_once 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

		$respuesta['id'] = $this->getId();
		//dd($this->Model->get($this->getId()));
		$respuesta['factura'] = $this->Model->get($this->getId());

		$this->view->template('facturacion/factura', $respuesta);
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
						'precio' => $detail['precio'],
					));
				}
			}
			echo retornoJson($respuesta);
		}
	}

	public function test() {
		$id = $this->getId();
		$factura = $this->Model->get($id);
		//dd($factura);
		$html = '<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  @charset "UTF-8";
  html {
    font-family: Verdana,Geneva,sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
  }
  body {
    font-family: Verdana,Geneva,sans-serif;
    font-size: 12px;
    line-height: 1.428571429;
    margin: 0;
  }
  .table {
  	width: 60%;
    border-collapse: collapse;
    border-color: blue;
  }
  table {
  	width: 60%;
    border-collapse: collapse;
    border-color: blue;
  }
</style>
</head>
<body>
  <table class="table">
    <tbody>
      <tr>
        <td colspan="2" rowspan="2"></td>
        <td style="vertical-align: text-top;" rowspan="2">Tipo de Documento<br><p style="font-size: 25px;"></p></td>
        <td style="vertical-align: text-top;">Fecha<br><br>'.$factura['fecha'].'</td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Folio<br><br>'.$id.'</td>
      </tr>
      <tr>
        <td colspan="2">
          <address>
          </address>
        </td>
        <td colspan="2">
          <address>
          </address>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table">
    <tbody>
      <tr bgcolor="#E0E0E0">
        <td style="text-align: center;">Clave Prod</td>
        <td style="text-align: center;">Producto</td>
        <td style="text-align: center;">Cantidad</td>
        <td style="text-align: center;">P. Unit</td>
        <td style="text-align: center;">Importe</td>
      </tr>';
    if(count($factura['detalle'])) {
    	$i = 0;
    	foreach($factura['detalle'] as $detalle) {
				/*$subtotal = $subtotal + $detalle['subtotal'];
				$total = $total + $detalle['subtotal'];*/
				$html .= '<tr>';
				$html .= '<td>'.$detalle['id_producto'].'</td>';
				$html .= '<td>'.$detalle['nombre'].'</td>';
				$html .= '<td class="col-xs-1 col-md-1"><div class="pull-right">'.
						'<input type="text" class="form-control" style="text-align:right" value="'.$detalle['cantidad'].'" readonly="readonly"></div></td>';
				$html .= '<td>'.$detalle['precio'].'</td>';
				$html .= '<td>'.$detalle['subtotal'].'</td>';
				$html .= '</tr>';
				$i++;
		}
	}
    $html .= '</tbody></table></body></html>';

		$html2pdf = new Html2Pdf();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
	}

	public function sendMail() {
		$id = $this->getId();
		$factura = $this->Model->get($id);
		$mail = new PHPMailer(true);
		try { 

		$mail->isSMTP();
	   	$mail->Host = 'smtp.gmail.co';
	   	$mail->SMTPAuth = TRUE;
	   	$mail->SMTPSecure = 'tls';
	   	$mail->Username = 'emmanuelsantizfelipe@gmail.com';
	   	$mail->Password = 'emmanuel@07011';
	   	$mail->Port = 587;
	   
	   	/* Disable some SSL checks. */
	   	$mail->SMTPOptions = array(
	      'ssl' => array(
	      'verify_peer' => false,
	      'verify_peer_name' => false,
	      'allow_self_signed' => true
	      )
	   	);

	   	$mail->setFrom('emmanuel.07.01@hotmail.com', 'Darth Vader');
   		$mail->addAddress('emmanuelsantizfelipe@gmail.com', 'Emperor');
   		$mail->Subject = 'Force';
   		$mail->Body = 'There is a great disturbance in the Force.';
	   
	   /* Finally send the mail. */
	   $mail->send();
		}
		catch (Exception $e)
		{
		   echo $e->errorMessage();
		}
	}
}
?>