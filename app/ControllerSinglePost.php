<?php

class ControllerSinglePost {
	private $data;
	protected $model;

	function __construct($id) {
		// $this->data = $this->db->prepare("SELECT * FROM news")->fetch();
		$this->model = new PostsModel();
		$this->data = $this->model->getById($id);
		if (count($this->data) === 0) {
			(new BaseController)->router->triggerNotFound($_REQUEST['uri']);
		}
		$this->data = $this->data[0];
	}

	function Render() {
		extract($this->data);
		include 'ViewSinglePost.php';
	}

	private function rowColumnExists($row, $columnName) {
		return isset($row[$columnName]) && $row[$columnName] !== null;
	}
}
