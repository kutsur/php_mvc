<?php
//
// $dsn = 'mysql:host=localhost;dbname=testtask';
// $username = 'test';
// $password = 'test';
// $options = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// );
// $dbh = new PDO($dsn, $username, $password, $options);


class DB {
	private $pdo;
	function __construct($dsn, $username, $password, $options) {
		$this->pdo = new PDO($dsn, $username, $password, $options);
	}
	function __call($name, $params) {
		return call_user_func_array([$this->pdo, $name], $params);
	}
}
