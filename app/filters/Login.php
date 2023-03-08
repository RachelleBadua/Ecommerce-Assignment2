<?php
namespace app\filters;

#[\Attribute]
class Login implements \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index');
			return true;
		}
		return false;
	}
}