<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\Login]
	//#[\app\filters\Profile]
	public function create(){
		if(isset($_POST['action'])){
			$publication = new \app\models\Publication();

			$publication->caption = $_POST['caption'];
			$publication->profile_id = $_SESSION['user_id'];
			$fileName = $this->saveFile($_SESSION['user_id']);

			if(isset($fileName['target_file']))
                $publication->picture = $fileName["target_file"];

            $uploadMessage = $fileName["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$fileName["upload_message"];

            $success = $publication->insert();
			if($success){
				header('location:/Profile/details?success=Post created.'.$uploadMessage);
			}
			else{
				header('location:/Publication/create?error=Something went wrong.'.$uploadMessage);
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

	public function saveFile($user_id){
		$uploadedFile = array();

        if(isset($_FILES["picture"]) && ($_FILES["picture"]["error"] == UPLOAD_ERR_OK)){
            $info = getimagesize($_FILES["picture"]["tmp_name"]);
            $allowedTypes = ["jpg", "png", "gif"];
            $fileName = basename($_FILES["picture"]["name"]);
            $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

            if($info == false){
                $uploadedFile["upload_message"] = "Bad image file format!";
                $uploadedFile["target_file"] = null;

            }else if(!in_array($fileType, $allowedTypes)){//File uploaded, but check the image file type
                $uploadedFile["upload_message"] = "The image file type is not accepted!";
                $uploadedFile["target_file"] = null;

            }else{
                // Save the image in the images folder of htdocs
                $path ='images'.DIRECTORY_SEPARATOR;
                $targetFileName = $user_id.'-'.uniqid().'.'.$fileType;
                move_uploaded_file($_FILES["picture"]["tmp_name"], $path.$targetFileName);
                $uploadedFile["upload_message"] = "success";
                $uploadedFile["target_file"] = $targetFileName;
                return $uploadedFile;
            }
        }else{
            $uploadedFile["upload_message"] = "Image not specified or not uploaded successfully. :/";
            $uploadedFile["target_file"] = null;
        }
        return $uploadedFile;
	}
}