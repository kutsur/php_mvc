<?php

class ControllerSinglePost extends BaseController {
	private $data;
	protected $model;
	private $childs = [];
	private $brokenData;

	function __construct($id) {
		$this->model = new PostsModel();
		if (!is_numeric($id)) {
			$this->brokenData = true;
			$this->router->triggerNotFound($_REQUEST['uri']);
			return;
		}
		$this->data = $this->model->getById($id);
		if (count($this->data) === 0) {
			$this->brokenData = true;
			$this->router->triggerNotFound($_REQUEST['uri']);
			return;
		}
		$this->data = $this->data[0];
		BaseController::register('pageTitle', $this->data['title']);

		$this->childs['bottom'][] = new ControllerComment($id);
	}

	function renderChilds($part) {
		if (!isset($this->childs[$part])) {
			log($part + 'not found');
			return '';
		}

		foreach ($this->childs[$part] as $child) {
			log('Rendering' + $part);
			$child->render();
		}
	}

	function Render() {
		if ($this->brokenData) { return; }
		extract($this->data);
		include 'ViewSinglePost.php';
	}

	private function rowColumnExists($row, $columnName) {
		return isset($row[$columnName]) && $row[$columnName] !== null;
	}
}
