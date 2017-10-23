<?php
	session_start();


	include_once('lib/database.class.php');
	include_once('lib/user.class.php');

	$db = new database();
	$User = new user($db);

	$User->SubmittedUser = $_POST['username'];
	$User->SubmittedPass = $_POST['password']; 


	if($UserName = $User->Login()) //have match, returns true
	{
		//echo $UserName;

		$UserData = $User->GetUser();
		print_r($UserData);

		
	}


		


?>



