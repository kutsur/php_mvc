<?php

class PostsModel extends BaseController {
	function __construct(){}

	function getAll(){
		$result = $this->db->prepare("SELECT * FROM news");
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function getById($id) {
		$result = $this->db->prepare("SELECT * FROM news WHERE id=:id");
		$result->execute(['id' => $id]);
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}
}
