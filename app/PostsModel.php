<?php
	/*
	function viewPost(){
		$stmt = $dbh->query('SELECT * FROM news');
		while ($row = $stmt->fetch()){
			   echo $row['title'] . "<br>";
			   echo $row['date'] . "<br>";
			   echo $row['text'] . "<br>";
			   echo "<br>";
		}
	}
	*/





	// class modelPost{
class PostsModel extends BaseController {
		// private $title, $text, $date;
		function __construct(){
		// function __construct($title, $text, $date) {
			// global $dbh;
			// $dbh = BaseController::get("db");
			// $stmt = $this->db->prepare("INSERT INTO news (title,text,date) VALUES (?,?,?)");
			// $stmt->bindParam(1, $title);
			// $stmt->bindParam(2, $text);
			// $stmt->bindParam(3, $date);
			// $this->title = $title;
			// $this->text = $text;
			// $this->date - $date;
			// $stmt->execute();
		}

		function getAll(){
			return $this->db->prepare("SELECT * FROM news")->fetch();
		}
	}

	