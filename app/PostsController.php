<?php

class ControllerPost{
	private $data;
	protected $model;
	private $pageCount;

	function __construct($page = 1) {
		$this->model = new PostsModel();
		BaseController::register('pageTitle', 'Posts');
		$this->data = $this->model->getLimit(10, ($page - 1) * 10);
	}

	function getPageCount() {
		if (!$this->pageCount) {
			$this->pageCount = round($this->model->getCount() / 10) + 1;
		}
		return $this->pageCount;
	}

	function Render() {
		include 'ViewPost.php';
	}

	private function rowColumnExists($row, $columnName) {
		return isset($row[$columnName]) && $row[$columnName] !== null;
	}
}
