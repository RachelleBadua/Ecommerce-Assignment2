<?php
namespace app\controllers;

class Follow extends \app\core\Controller{

	#[\app\filters\Login]
	public function index(){
		$follow = new \app\models\Follow();
		$follow = $follow->getALL($_SESSION['user_id']);
		$this->view('Follow/index', $follow);
	}

	#[\app\filters\Login]
	public function followUser($following){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->insert();
		header('location:/Profile/details/'. $following . '?success=Successfully followed');
	}

	public function unfollowUser($following){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->delete();
		header('location:/Profile/details/'. $following . '?success=Successfully unfollowed');
	}
}