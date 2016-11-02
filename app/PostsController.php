<?php 

class ControlPost extends PostsModel{
	private $data;
	
	function __construct(){
		$data = $this->db->prepare("SELECT * FROM news");
		extract($data);
		include 'ViewPost.php';
	}
	

}