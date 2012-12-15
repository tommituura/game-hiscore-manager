<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/', function() {
	echo '["Hello", "World!"]';
});

$app->get('/hello/:name', function($name){
	echo "Hello, $name";
});



$app->run();

?>
