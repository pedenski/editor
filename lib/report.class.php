<?php 


class report {

	private $conn;
	private $reporttitle = "reporttitle";	
	private $reportdetails = "reportdetails";
	private $reportseverity = "reportseverity";
	

	

	public function __construct($db) {
		$this->conn = $db;
	}


	//insert post title
	public function insert() {
		$q1 = "INSERT INTO ".$this->title."
				SET
				PostTitle=:PostTitle,
				UserID=:UserID,
				Severity=:Severity";

		$sql = $this->conn->prepare($q1);
		$this->time = $date('Y-m-d H:i:s');
	}
	

	public function getSeverity() {
		$q = "SELECT SeverityID, SeverityName FROM ".$this->reportseverity;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetchALL(PDO::FETCH_ASSOC);
		return $row;

	}

}
?>