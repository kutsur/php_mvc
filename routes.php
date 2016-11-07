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
