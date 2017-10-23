<?php

class user {

	protected $UserData;
	public $SubmittedUser;
	public $SubmittedPass;
		
	public function __construct($db) 
	{
		$this->conn = $db->getConn();
	}

	public function is_Credible()
	{	

		$EncryptedPass = md5($this->SubmittedPass);
		
		$q = "SELECT * FROM users WHERE UserName = ? AND Password = ? ";

		$sql = $this->conn->prepare($q);

		$sql->bindParam(1, $this->SubmittedUser);
		$sql->bindParam(2, $EncryptedPass);
		$sql->execute();

		if($sql->rowCount() > 0 ) //returns true
		{
			$UserData = $sql->fetch(PDO::FETCH_ASSOC);
			return $UserData = ($EncryptedPass == $UserData['Password'] ? $UserData : false);
		} 

	}


	public function Login()
	{
		$UserData = $this->is_Credible();
		if($UserData) //if returns true
		{
			$this->UserData = $UserData;

			$_SESSION['SessionID'] = $UserData['UserID'];
			$_SESSION['SessionName'] = $UserData['UserName'];

			return $UserData['UserName'];
		}

		else {
			return false;
		}


	}

	public function GetUser()
	{
		return $this->UserData;
	}



}

?>
