<?php
ini_set('error_reporting', E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('BASEDIR', __DIR__);
define('BASEURL', '/assignments_tracker');
define('MAIN_CSS', BASEDIR . DS . 'public' . DS . 'assets' . DS . 'styles.css');

//Autoloader
require_once 'vendor/autoload.php';
//Load routes
$routes = require_once 'app/config/routes.php';

$view = new View();

//Rendering main page
//$view->render();


//Routing
$router = new Router($routes);
$router->run(($_SERVER['REQUEST_URI']));
//Pass it to Router->run()
//Include Router

//Include Database

