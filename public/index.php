<?php
require  __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;

Session::start();

require '../helpers.php';

//instantiate router
$router = new Router();

//get  Routes
$routes = require basePath('routes.php');

// Get  current URI and Http method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
             
//route the request
$router->route($uri);
   