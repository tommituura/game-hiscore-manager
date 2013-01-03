<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

require_once 'db.php';

$app->get('/', function() {
	include('frontpage.html');
});

$app->get('/games/', function(){
	echo list_games();
});

$app->post('/games/', function() {
    global $app;
    $req = $app->request();
    $paramsBody = json_decode($req->getBody());
    echo add_game($paramsBody->name);
});


$app->run();

?>
