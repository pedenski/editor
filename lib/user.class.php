<?php

class user {

	private $users = "users";
	public $UserID;
	public $UserName;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	public function translateID() {
		$q = "SELECT UserName FROM ".$this->users." WHERE UserID = ".$this->UserID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $this->UserName = $row['UserName'];
	}

}

?>
