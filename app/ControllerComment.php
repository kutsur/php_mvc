<?php

class ControllerComment {
	private $data;
	protected $model;

	function __construct($id) {
		$this->model = new CommentsModel();
		$this->data = $this->model->getByArticleId($id);
	}

	private function rowColumnExists($row, $columnName) {
		return isset($row[$columnName]) && $row[$columnName] !== null;
	}

	function Render() {
		include 'ViewComment.php';
	}

}
