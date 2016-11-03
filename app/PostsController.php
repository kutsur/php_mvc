<?php 

class ControllerPost{
	private $data;
	protected $model;

	function __construct() {
		// $this->data = $this->db->prepare("SELECT * FROM news")->fetch();
		$this->model = new PostsModel();
		$this->data = $this->model->getAll();

	}

	function Render() {
		extract($this->data);
		include 'ViewPost.php';
		var_dump($post);
	}
	

}