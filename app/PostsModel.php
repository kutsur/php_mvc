<?php

class PostsModel extends BaseController {

	function __construct(){}

	function getAll(){
		$result = $this->db->prepare("SELECT * FROM news");
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function getLimit($limit, $offset = 0) {
		$result = $this->db->prepare("SELECT * FROM news LIMIT $offset, $limit");
		$result->execute();
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function getCount() {
		$result = $this->db->prepare("SELECT count(*) FROM news");
		$result->execute();
		$result = $result->fetch()[0];
		return (int)$result;
	}

	function getById($id) {
		$result = $this->db->prepare("SELECT * FROM news WHERE id=:id");
		$result->execute(['id' => $id]);
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}
}
