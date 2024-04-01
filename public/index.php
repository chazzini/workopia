<?php
require '../helper.php';
require basePath('Database.php');
require basePath('Router.php');


//intaitate the route
$router = new Router();

//get current uri
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//get current uri method
$method = $_SERVER['REQUEST_METHOD'];


$routes = require basePath('routes.php');

$router->route($uri, $method);