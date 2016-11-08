<?php

class CommentsModel extends BaseController {

	function __construct(){}

	function getByArticleId($id) {
		$result = $this->db->prepare("SELECT * FROM comments WHERE article=:article");
		$result->execute(['article' => $id]);
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}
}
