<?php
namespace app\controllers;

class User extends \app\core\Controller{

	// login page
	public function index(){
		if(isset($_POST['action'])){
			// process the input
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			if($user){
				if(password_verify($_POST['password'], $user->password_hash)){
					// the user is correct!
					// user can login
					$_SESSION['user_id'] = $user->user_id;
					header('location:/Profile/index');
				}else{
					// the user is no correct
					header('location:/User/index?error=Bad username/password combination');
				}
			}else{
				// no such user to redirect
				header('location:/User/index?error=Bad username/password combination');
			}
		}else{
			$this->view('User/index'); 		
		}
	}

	// registration page
	public function register(){
		if(isset($_POST['action'])){
			// process the input
			$user = new \app\models\User();
			$usercheck = $user->getByUsername($_POST['username']);
			if(!$usercheck){
				$user->username = $_POST['username'];
				// making the password a hash and stores it in password_hash
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); 
				$user->insert();
				header('location:/User/index');
			}else{
				header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
			}
		}else{
			// display the form
			$this->view('User/register'); // TODO: add the new view file
		}
	}
}