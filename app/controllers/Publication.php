<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\Login]
	//#[\app\filters\Profile]
	public function create(){
		if(isset($_POST['action'])){
			$publication = new \app\models\Publication();

			$publication->caption = $_POST['caption'];
			$publication->profile_id = $_SESSION['profile_id'];
			$fileName = $this->saveFile($_FILES['picture']);
			if($fileName){
				$publication->picture = $filaName;
				$publication->insert();
				header('location:/Profile/index');
			} else{
				header('location:/Publication/create');
			}
		}else{
			$this->view('Publication/create');
		}
	}

	#[\app\filters\Login]
	// #[\app\filters\Profile]
	public function edit($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		if(isset($_POST['action']) && $publication->profile_id == $_SESSION['profile_id']){
			$publication->caption = $_POST['caption'];
			$publication->update();
			header('location:/Profile/index/');
		}else{
			$this->view('Publication/edit', $publication);
		}
	}
}