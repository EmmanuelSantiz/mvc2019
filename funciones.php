<?php
if (!function_exists('isAjax')) {
	function isAjax() {
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
}

if (!function_exists('retornoJson')) {
	function retornoJson($data) {
		header('Content-type:application/json;charset=utf-8');
		return json_encode($data);
	}
}

if (!function_exists('base_url')) {
	function base_url($data = '') {
		return 'http://localhost/curso/'.$data;
	}
}

if (!function_exists('dd')) {
	function dd($array = array()) {
		echo '<pre>';
		var_dump($array);
		echo '</pre>';
		exit();
	}
}

if (!function_exists('redirect')) {
	function redirect($data = '') {
		header('Location: http://localhost/curso/'.$data);
	}
}
?>