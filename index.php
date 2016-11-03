<?php

include 'app/BaseController.php';
include 'app/DataBase.php';
include 'app/PostsModel.php';
include 'app/PostsController.php';
include 'app/HeaderController.php';
include 'app/FooterController.php';


$dsn = 'mysql:host=127.0.0.1;dbname=testtask';
$username = 'test';
$password = 'test';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
BaseController::register("db", new DB($dsn, $username, $password, $options));
unset($dsn, $username, $password, $options);
(new HeaderController())->Render();
$cont = new ControllerPost();
$cont->Render();
(new FooterController())->Render();
