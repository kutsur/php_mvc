<?php

$bc = new BaseController();
$bc->router->add("/", function() {
	$cont = new ControllerPost();
	$cont->Render();
});



$bc->router->add("/post/.+", function($id) use($bc) {
	if (!is_numeric($id)) {
		$bc->router->triggerNotFound($_REQUEST['uri']);
		return;
	}
	$single = new SinglePostController($id);
	$single->Render();

});
