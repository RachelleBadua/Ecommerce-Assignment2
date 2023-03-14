<?php
namespace app\controllers;

class Follow extends \app\core\Controller{

	#[\app\filters\Login]
	public function index(){
		$follow = new \app\models\Follow();
		$follow = $follow->getALL
	}
}