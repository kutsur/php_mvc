<?php

class ControllerComment {
	private $data;
	protected $model;

	function __construct($id) {
		$this->model = new CommentsModel();
		$this->data = $this->model->getByArticleId($id);
	}

	function Render() {
		$this->data;
		include 'ViewSinglePost.php';
	}

}
