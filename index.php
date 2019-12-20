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
//echo phpinfo();
$app = new App();
?>