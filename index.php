<?php
ini_set('error_reporting', E_ALL);
//Autoloader
require 'vendor/autoload.php';

//Routing
$router = new Router();
$router->run(($_SERVER['PATH_INFO']));
//Pass it to Router->run()
//Include Router

//Include Database

