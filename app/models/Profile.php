<?php
namespace app\models;

class Profile extends \app\core\Model{
	public $user_id;
	public $first_name;
	public $last_name;
	public $middle_name;
	public $picture;

	public function getByUserId($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id"; 
		$STH = $this->connection->prepare($SQL);
		$data = ['user_id'=>$user_id];
		$STH->execute($data);	
		$STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');
		return $STH->fetch();
	}

	public function insert() {
        $SQL = "INSERT INTO profile(user_id, first_name, last_name, middle_name, picture) VALUES (:user_id, :first_name, :last_name, :middle_name, :picture)";
        $STH = $this->connection->prepare($SQL);
        $data = [
            'user_id'=>$this->user_id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'middle_name'=>$this->middle_name ?? '',
            'picture'=>$this->picture
        ];
        $STH->execute($data);
        return $STH->rowCount();
    }

	public function update() {
        $SQL = "UPDATE `profile` SET `first_name`=:first_name,`last_name`=:last_name,`middle_name`=:middle_name,`picture`=:picture WHERE user_id = :user_id";
        $STH = $this->connection->prepare($SQL);
        $data = [
            'user_id'=>$this->user_id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'middle_name'=>$this->middle_name,
            'picture'=>$this->picture
        ];
        $STH->execute($data);
        return $STH->rowCount();
    }

    public function getPublications(){
        $SQL = "SELECT * FROM publication WHERE profile_id=:profile_id ORDER BY `timestamp` DESC";
        $STH = $this->connection->prepare($SQL);
        $STH->execute(['profile_id'=>$this->user_id]);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Publication');
        return $STH->fetchAll();
    }

    public function getFollowers(){
        $SQL = "SELECT * FROM follow WHERE follower_id=:follower_id";
        $STH = $this->connection->prepare($SQL);
        $STH->execute(['follower_id'=>$this->user_id]);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Publication');
        return $STH->fetchAll();
    }

    
}