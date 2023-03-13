<?php
namespace app\core;

class Controller {

	public function view($name, $data = []){
		include('app/views/' . $name . '.php');
	}
}