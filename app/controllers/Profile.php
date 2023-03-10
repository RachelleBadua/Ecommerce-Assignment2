<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	#[\app\filters\Login]
	public function index(){
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($_SESSION['user_id']);
		if($profile)
			$this->view('Profile/details', $profile);
		else 
			header('location:/Profile/create');
	}

	public function logout(){
		session_destroy();
		header('location:/User/index');
	}

	#[\app\filters\Login]
	public function create(){
		// checks if button is clicked
		if(isset($_POST['action'])){
			$profile = new \app\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->middle_name = $_POST['middle_name'];

			$uploadedPicture = $this->uploadPicture($_SESSION['user_id']);

            if(isset($uploadedPicture['target_file']))
                $profile->picture = $uploadedPicture["target_file"];

            $uploadMessage = $uploadedPicture["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$uploadedPicture["upload_message"];

			$success = $profile->insert();
			if($success){
				header('location:/Profile/index?success=Profile created.'.$uploadMessage);
			}
			else{
				header('location:/Profile/index?error=Something went wrong. You can only have one profile.'.$uploadMessage);
			}
		}else{
			$this->view('Profile/create');
		}
	}

	#[\app\filters\Login]
	public function edit(){
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($_SESSION['user_id']);

		if(isset($_POST['action'])){
			// do not need to delete user_id
			// $profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->middle_name = $_POST['middle_name'];

			$uploadedPicture = $this->uploadPicture($_SESSION['user_id']);

			if(isset($uploadedPicture['target_file'])){
                $profile->picture = $uploadedPicture["target_file"];
			}

            $uploadMessage = $uploadedPicture["upload_message"] == 'success' ? '' : '&error=Something went wrong :)'.$uploadedPicture["upload_message"];

			$success = $profile->update();
			if($success) {
				header('location:/Profile/index?success=Profile modified.'.$uploadMessage);
			}
			else {
				header('location:/Profile/index?error=Something went wrong. :('.$uploadMessage);
			}
		}else{
			$this->view('Profile/edit', $profile); // adding $profile tp view info, to fill the fields
		}
	}

	public function uploadPicture($user_id){

        $uploadedFile = array();

        if(isset($_FILES["profilePicture"]) && ($_FILES["profilePicture"]["error"] == UPLOAD_ERR_OK)){

            $info = getimagesize($_FILES["profilePicture"]["tmp_name"]);

            $allowedTypes = ["jpg", "png", "gif"];

            $fileName = basename($_FILES["profilePicture"]["name"]);

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

                move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $path.$targetFileName);

                $uploadedFile["upload_message"] = "success";

                $uploadedFile["target_file"] = $targetFileName;

                return  $uploadedFile;

            }

        }else{

            $uploadedFile["upload_message"] = "Image not specified or not uploaded successfully. :/";

            $uploadedFile["target_file"] = null;
        }

        return $uploadedFile;
    }

    public function details($user_id){//detailed view for a record
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($user_id);
		$this->view('Profile/details', $profile);
	}

	// public function getPublications($user_id){
	// 	$SQL = "SELECT * FROM publication 
	// 			WHERE profile_id=:profile_id 
	// 			ORDER BY `timestamp` DESC";

	// 	$STH = $this->connection->prepare($SQL);

	// 	// $profile_ID = $_SESSION['user_id'];
	// 	$STH->execute(['profile_id'=>$this->user_id]);

	// 	$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');

	// 	return $STH->fetchAll();
	// }
}