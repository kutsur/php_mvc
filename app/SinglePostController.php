<?php

class SinglePostController{
	private $data;
	protected $model;
	private $id;
	
	function __construct() {
		$this->model = new PostsModel();
		$this->data = $this->model->singlePost($id);

	}

	function Render() {
		include 'SinglePostView.php';
	}

	private function rowColumnExists($row, $columnName) {
		return isset($row[$columnName]) && $row[$columnName] !== null;
	}
}
