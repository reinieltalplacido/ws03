<?php

require  __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

session_start();

use Framework\Router;
//instantiate router

$router = new Router();

//get  Routes
$routes = require basePath('routes.php');

// Get  current URI and Http method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
             
//route the request
$router->route($uri);
   