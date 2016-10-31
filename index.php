<?php
/*
<!doctype html>
<html>
    <head>
        <title>Test Page for ITSM</title>
        <meta charset="utf-8" />
        <link href="./css/style.css" rel="stylesheet" media="all">
    </head>
    <body>
    <header>
    </header>
    </body>
</html>
*/

include 'app/BaseController.php';
include 'app/DataBase.php';
include 'app/PostsController.php';
include 'app/PostsModel.php';

$dsn = 'mysql:host=127.0.0.1;dbname=testtask';
$username = 'test';
$password = 'test';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

BaseController::register("db", new DB($dsn, $username, $password, $options));
unset($dsn, $username, $password, $options);

$post = new PostsModel('text','test stete efsfs','2015-10-08');

var_dump($post);
