<?php
require __DIR__ . '/../vendor/autoload.php';
require '../helper.php';

use Framework\Router;
use Framework\Session;

Session::start();

// spl_autoload_register(fn($class) =>
//     (file_exists(basePath('/Framework/' . $class . '.php')))
//     ? require basePath('/Framework/' . $class . '.php')
//     : '');


//intaitate the route
$router = new Router();

//get current uri
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


//get current uri method
$routes = require basePath('routes.php');

$router->route($uri);