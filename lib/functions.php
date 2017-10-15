<?php

/* CONNECT TO DB PDO */
function db() {
	try {
		$us = 'root';
		$pw = '';
		$db = new PDO('mysql:host=localhost;dbname=zild_editor', $us, $pw);	
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $db;
	} catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	}
}

function submitpost() {
$db = db();


//insert post title
$query = "INSERT INTO posts (PostID, PostTitle, PostDate, Deleted, UserID) VALUES (?, ?, ?, ?, ?)";
$sql = $db->prepare($query);
$sql->execute(array('', $_POST['title'], '', '', 1));

$PostID = $db->lastInsertId();

//insert post details
$query = "INSERT INTO postdetails (PostDetailID, PostID, Sequence, PostText) VALUES (?, ?, ?, ?)";
$sql = $db->prepare($query);
$sql->execute(array('', $PostID, '', $_POST['textarea']));
return "Submit Success";

}


function getpost() {
 $db = db();
 $query = "SELECT * FROM postdetails";
 $sql = $db->prepare($query);
 $sql->execute();
 $row = $sql->fetchALL();
 return $row;
}
?>