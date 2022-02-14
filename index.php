<?php
/**
 * route function
 * The match expression used for method and included files based on that method 
 */

// include router object file
require_once "router.php";

route('/', function () {	
	match (strtoupper($_SERVER['REQUEST_METHOD'])) {
		'GET' => include 'welcome.php',
		default => include './api/404.php'
	};	
});

route('/api/products', function () {
	match (strtoupper($_SERVER['REQUEST_METHOD'])) {
		'GET' => include './api/read_all.php',
		default => include './api/404.php'
	};		
});

route('/api/product', function () {
	match (strtoupper($_SERVER['REQUEST_METHOD'])) {
		'GET' => include './api/read_single.php',
		'POST' => include './api/create.php',
		'PUT' => include './api/update.php',
		'DELETE' => include './api/delete.php',
		default => include '404.php'
	};
});


/** 
 * @param $req_uri - check the environment and replace folder name if is on local
*/
$req_uri = str_replace(basename(dirname(__FILE__)), '', $_SERVER['REQUEST_URI']);
dispatch($req_uri);
?>