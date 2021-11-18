<?php
ini_set('error_reporting', E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('BASEDIR', __DIR__);
define('MAIN_CSS', BASEDIR . DS . 'public' . DS . 'assets' . DS . 'styles.css');
//Autoloader
require 'vendor/autoload.php';
$view = new View();

//Rendering main page
//$view->render();


//Routing
$router = new Router();
$router->run(($_SERVER['PATH_INFO']));
//Pass it to Router->run()
//Include Router

//Include Database

