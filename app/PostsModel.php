<?php
	require_once "DataBase.php";
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
	

	class modelPost{

		function __construct(){
			global $dbh;
			$stmt = $dbh->prepare("INSERT INTO news (title,text,date) VALUES (?,?,?)");
			$stmt->bindParam(1, $title);
			$stmt->bindParam(2, $text);
			$stmt->bindParam(3, $date);


			$this->title = $title;
			$this->text = $text;
			$this->date - $date;
			
			$stmt->execute();
		}
		
	}
	
	$post = new modelPost('text','test stete efsfs','2015-10-08');
?>