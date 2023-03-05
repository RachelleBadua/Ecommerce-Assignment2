<?php
namespace app\core;

class App {

	function __construct(){
		$request = $this->parseUrl($_GET['url'] ?? '');
		$controller = 'Main';
		$method = 'index';
		$params = [];

		if(file_exists('app/controller/' . $request[0] . '.php')){
			$controller = $request[0];
			unset($resquest[0]);
		}
		$controller = 'app\\controllers\\' . $controller;
		$controller = new $controller;

		if(isset($request[1]) && method_exists($controller, $request[1])){
			$method = $request[1];
			unset($request[1]);
		}
		$params = array_values($request);
		call_user_func_array([$controller, $method], $params);
	}

	function parseUrl($url) {
		return explode('/', trim($url, '/'));
	}
}