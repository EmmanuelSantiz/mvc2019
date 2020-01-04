<?php
ob_start();
session_start();

require_once 'lib/Database.php';
require_once 'lib/Controller.php';
require_once 'lib/View.php';
require_once 'lib/Model.php';
require_once 'lib/App.php';
require_once 'lib/Helper.php';

require_once 'funciones.php';
/*require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;*/

/*$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();*/
		
//echo phpinfo();
$app = new App();
?>