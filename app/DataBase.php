<?php
$dsn = 'mysql:host=localhost;dbname=testtask';
$username = 'test';
$password = 'test';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);



?>
