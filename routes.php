<?php

$bc = new BaseController();
$bc->router->add("/", function() {
	$cont = new ControllerPost();
	$cont->Render();
});



$bc->router->add("/post/.+", function($id) use($bc) {
	$cont = new ControllerSinglePost($id);
	$cont->Render();
});

$bc->router->add("/page/.+", function($page) use($bc) {
	$cont = new ControllerPost($page);
	$cont->Render();
});
