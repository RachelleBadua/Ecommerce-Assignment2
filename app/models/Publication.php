<?php
namespace app\models;

class Publication extends \app\core\Model{
	public $publication_id;
	public $profile_id;
	public $picture;
	public $caption;
	public $timestamp;

	public function insert(){
		$SQL = "INSERT INTO publication (profile_id, picture, caption) value (:profile_id, :picture, :caption)";
		$STH = $this->connection->prepare($SQL);
		$data = ['profile_id'=>$this->sender, 
					'picture'=>$this->receiver,
					'caption'=>$this->message];
		$STH->execute($data);

		$this->publication_id = $this->connection->lastInsertId();
	}

	public function delete($message_id, $user_id){
		// TODO: only allow this if you are the owner
		// only the owner of the message can delete it
		$SQL = "DELETE FROM message WHERE publication_id=:publication_id AND profile_id = :profile_id"; 
		$STH = $this->connection->prepare($SQL);
		$data = ['publication_id'=>$publication_id, 'profile_id'=>$profile_id];
		$STH->execute($data);
		return $STH->rowCount(); // gives the amount of rows in the table 
	}

	public function getAllForUser($user_id){
		// $SQL = "SELECT * FROM message WHERE sender=:sender OR receiver=:receiver";
		$SQL = "SELECT message.message_id, message.message, message.timestamp, sendertable.username AS sender_name, `user`.`username` AS receiver_name FROM `message` JOIN `user` AS sendertable ON `message`.`sender` = sendertable.`user_id` JOIN `user` ON `user`.`user_id` = message.receiver WHERE sender=:sender OR receiver=:receiver";
		
		$STH = $this->connection->prepare($SQL);
		$data = ['receiver'=>$user_id, 
					'sender'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll(); // gets the Messages from database with an array
	}
}