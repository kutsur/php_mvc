<?php

include 'app/BaseController.php';
include 'app/DataBase.php';
include 'app/PostsModel.php';
include 'app/PostsController.php';
include 'app/ControllerSinglePost.php';
include 'app/HeaderController.php';
include 'app/FooterController.php';
include 'lib/router.php';

function fromJS() {
	return isset($_GET['from']) && $_GET['from'] === 'js';
}

$dsn = 'mysql:host=127.0.0.1;dbname=testtask';
$username = 'test';
$password = 'test';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
BaseController::register("db", new DB($dsn, $username, $password, $options));
unset($dsn, $username, $password, $options);
if (!fromJS()) {
	(new HeaderController())->Render();
}
BaseController::register("router", new Router());

$bc = new BaseController();
$bc->router->submit();

if (!fromJS()) {
	(new FooterController())->Render();
}
