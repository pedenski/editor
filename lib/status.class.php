<?php


class status {

	private $reportstatus = "reportstatus";
	public $StatusID;
	public $StatusName;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	public function translateID() {
		$q = "SELECT StatusName FROM ".$this->reportstatus." WHERE StatusID = ".$this->StatusID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $this->StatusName = $row['StatusName'];
	}

}


?>