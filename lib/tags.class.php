<?php

//SELECT tags.TagName FROM tags INNER JOIN tagmap ON tags.TagID = tagmap.TagID WHERE tagmap.ReportTitlePostID = 38
class tags {
	private $tags = "tags";
	public $PostID;


	public function __construct($db) {
		$this->conn = $db;
	}

	public function getTagsPage() {
	$q = "SELECT tags.TagName FROM ".$this->tags." INNER JOIN tagmap ON tags.TagID = tagmap.TagID WHERE tagmap.ReportTitlePostID = " .$this->PostID;

	$sql = $this->conn->prepare($q);
	$sql->execute();
	$row = $sql->fetchALL(PDO::FETCH_ASSOC);
	return $row;
	}
}


?>