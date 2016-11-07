<?php

class HeaderController {
	private $data;

	function __construct($title = 'Example') {
		$this->data['title'] = $title;
	}

	function Render() {
		extract($this->data);
		include 'HeaderView.php';
	}
}
