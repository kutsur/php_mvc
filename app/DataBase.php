<?php

class DB {
	private $pdo;
	function __construct($dsn, $username, $password, $options) {
		$this->pdo = new PDO($dsn, $username, $password, $options);
	}
	function __call($name, $params) {
		return call_user_func_array([$this->pdo, $name], $params);
	}
}
