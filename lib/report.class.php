<?php 
/*
 * CODE IS POETRY 
 * By Zildjian Murai - First OOP project
 * 10/18/2017 - 12:16AM
 *
 */

class report {

	private $conn;
	private $reporttitle = "reporttitle";	
	private $reportdetails = "reportdetails";
	private $reportseverity = "reportseverity";
	private $reportstatus = "reportstatus";
	private $tagstable = "tags";
	private $tagmap = "tagmap";

	//insert variables from create_post.php
	public $userid; //author
	public $postid;
	public $title; // title of the post
	public $severity; //level of severity
	public $status; // if resolved or not
	public $incidentdate; //date creation
	public $pageID;

	//textarea and lastid
	public $textarea;

	//tags
	public $tags;

	//global vars
	public $lastid; 
	public $lastTagID;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	/*
	 * INSERT QUERIES
	 *
	 */

	//insert post title, user, severity, status, incident date
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
	
	//insert textarea
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

	//insert tags
	public function insertTags() {
		$q = "INSERT INTO ".$this->tagstable."
			  SET TagName = :TagName";

		$sql = $this->conn->prepare($q);
	
		//foreach entry of tags in DB, get its lastID, and insert it to TagMap Table then execute
		foreach($this->tags as $tag ) {
				$sql->bindValue(":TagName",$tag, PDO::PARAM_STR);
				$sql->execute();
				$this->lastTagID = $this->conn->lastInsertID();
				$this->insertTagMap(); //execute
		}
	}

	//map tagging e.g (PostID 1 = Tag1, PostID 1 = Tag2)
	public function insertTagMap() {
		$q = "INSERT INTO ".$this->tagmap."
			  SET 
			  ReportTitlePostID = :ReportTitlePostID,
			  TagID = :TagID";

		$sql = $this->conn->prepare($q);
		$sql->bindValue(":ReportTitlePostID",$this->lastid);
		$sql->bindValue(":TagID",$this->lastTagID);
		$sql->execute();

	}


	/*
	 * SELECT QUERIES
	 *
	 */
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

	public function getPostTitle() {
		$q = "SELECT * FROM ".$this->reporttitle." WHERE PostID = ".$this->pageID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->postid = $row['PostID'];
		$this->title = $row['PostTitle'];
		$this->userid = $row['UserID'];
		$this->severity = $row['Severity'];
		$this->status = $row['Status'];
		$this->incidentdate = $row['IncidentDate'];
	}

	public function getPostDetail() {
		$q = "SELECT * FROM ".$this->reportdetails." WHERE PostID = ".$this->postid;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->textarea = $row['PostText'];
		
	}



}


/*
  $invalid_characters = array("$", "%", "#", "<", ">", "|");
            $str = str_replace($invalid_characters, "", $a);
*/
?>

