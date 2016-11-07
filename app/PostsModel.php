<?php

class PostsModel extends BaseController {
		private $id;
		
		function __construct(){
		// 
		}

		function getAll(){
			$result = $this->db->prepare("SELECT * FROM news");
			$result->execute();
			$result = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		function addPost($title, $text, $date){
			$dbh = BaseController::get("db");
			$stmt = $this->db->prepare("INSERT INTO news (title,text,date) VALUES (?,?,?)");
			$stmt->bindParam(1, $title);
			$stmt->bindParam(2, $text);
			$stmt->bindParam(3, $date);
			$this->title = $title;
			$this->text = $text;
			$this->date - $date;
			$stmt->execute();
		}

		function singlePost($id){

			$result = $this->db->prepare("SELECT * WHERE id='".$id."' FROM news");
			$result->execute();
			$result = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	}
