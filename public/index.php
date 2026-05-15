<?php

require  __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

session_start();

use Framework\Router;

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //uniform resource identifier
             

$router->route($uri);
   