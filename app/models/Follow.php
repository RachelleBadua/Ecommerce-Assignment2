<?php
namespace app/models;

class Follow extends \app\core\Model{
	public $follower_id;
	public $followed_id;
	public $timestamp;

	public function insert(){
		$SQL = "INSERT INTO follow (follower_id, followed_id) value (:follower_id, :followed_id)";
		$STH = $this->connection->prepare($SQL);
		$data = ['follower_id'=>$this->follower_id, 
				'followed_id'=>$this->followed_id;
		$STH->execute($data);

		$this->follower_id = $this->connection->lastInsertId();
		$this->followed_id = $this->connection->lastInsertId();
	}

	public function delete($client_id){
		$SQL = "DELETE FROM follow WHERE follower_id=:follower_id AND followed_id=:followed_id"; // 
		$STH = $this->connection->prepare($SQL);
		$data = ['follower_id'=>$follower_id, 'followed_id'=>$followed_id];
		$STH->execute($data);
	}

	public function getAll($user_id){
		$SQL = "SELECT * FROM follow WHERE follower = :user_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Follow');
		return $STH->fetchAll(); // gets the clients from database with an array
	}
}
