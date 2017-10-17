<?php

class severity {

	private $reportseverity = "reportseverity";
	public $severityID;
	public $severityName;
	
	public function __construct($db) {
		$this->conn = $db;
	}

	public function translateID() {
		$q = "SELECT SeverityName FROM ".$this->reportseverity." WHERE SeverityID = ".$this->severityID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		return $this->severityName = $row['SeverityName'];
	}

}




?>