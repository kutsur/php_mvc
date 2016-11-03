<?php

include 'app/BaseController.php';
include 'app/DataBase.php';
include 'app/PostsModel.php';
include 'app/PostsController.php';


$dsn = 'mysql:host=127.0.0.1;dbname=testtask';
$username = 'test';
$password = 'test';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
BaseController::register("db", new DB($dsn, $username, $password, $options));
unset($dsn, $username, $password, $options);
$cont = new ControllerPost();
$cont->Render();

var_dump($data);
