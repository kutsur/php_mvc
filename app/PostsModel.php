<?php
	require_once "DataBase.php";

	class Post{

		function addPost($title,$date,$text){
			$stmt = $dbh->prepare("INSERT INTO NEWS (title, date, text) VALUES (:title, :date, :text)");
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':date', $date);
			$stmt->bindParam(':text', $text);
			$stmt->execute();
		}
	}
	$post = new Post();
	$post->addPost('tercn','1985-05-15','sad sdak sdk asdkjaskdjksaj');
?>