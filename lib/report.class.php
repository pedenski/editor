<?php 


class report {

	private $conn;
	private $reporttitle = "reporttitle";	
	private $reportdetails = "reportdetails";
	private $reportseverity = "reportseverity";
	private $reportstatus = "reportstatus";
	private $tagstable = "tags";


	//insert variables from create_post.php
	public $userid; //author
	public $title; // title of the post
	public $severity; //level of severity
	public $status; // if resolved or not
	public $incidentdate; //date creation

	//textarea and lastid
	public $textarea;

	//tags
	public $tags;

	//global vars
	public $lastid; 
	

	public function __construct($db) {
		$this->conn = $db;
	}


	//insert post title
	public function insert() {
		$q = "INSERT INTO ".$this->reporttitle."
				SET
				UserID       = :UserID,
				PostTitle    = :PostTitle,
				Severity     = :Severity,
				Status       = :Status,
				IncidentDate = :IncidentDate";

		$sql = $this->conn->prepare($q);
		$sql->bindParam(":UserID", $this->userid);
		$sql->bindParam(":PostTitle", $this->title);
		$sql->bindParam(":Severity", $this->severity);
		$sql->bindParam(":Status", $this->status);
		$sql->bindParam(":IncidentDate", $this->incidentdate);
		$sql->execute();
		//get ID inserted
		return $this->lastid = $this->conn->lastInsertID();
	}
	
	public function insertTextArea() {
		$q = "INSERT INTO ".$this->reportdetails."
				SET
				PostID   = :PostID,
				PostText = :PostText";

		$sql = $this->conn->prepare($q);
		$sql->bindParam(":PostID", $this->lastid);
		$sql->bindParam(":PostText", $this->textarea);
		$sql->execute();
	}

	public function insertTags() {
		
		$q = "INSERT INTO ".$this->tagstable."
			  SET
			  TagID = :TagID";
		$sql = $this->conn->prepare($q);

		foreach($this->tags as &$t ) {
				$sql->bindParam(":TagID",$t,PDO::PARAM_STR);
		}
		$sql->execute();
		return $this->tags;
	}


	public function getSeverity() {
		$q = "SELECT SeverityID, SeverityName FROM ".$this->reportseverity;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetchALL(PDO::FETCH_ASSOC);
		return $row;
	}

	public function getStatus() {
		$q = "SELECT StatusID, StatusName FROM ".$this->reportstatus;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetchALL(PDO::FETCH_ASSOC);
		return $row;
	}


}


/*
  $invalid_characters = array("$", "%", "#", "<", ">", "|");
            $str = str_replace($invalid_characters, "", $a);
*/
?>

