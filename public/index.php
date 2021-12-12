<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
define('DS', DIRECTORY_SEPARATOR);
define('BASEDIR', __DIR__);
define('APPDIR', __DIR__ . '/../app/');
define('TEMPLATEDIR', APPDIR . '/views/');
define('BASEURL', '/assignments_tracker');

//Autoloader
require_once APPDIR . 'vendor/autoload.php';
require_once APPDIR . 'Core/Helpers.php';

//Load config
$config = require_once APPDIR . 'app/config/config.php';

//Include Database
$db = new Database($config['database']);
//$dbh = $db->connect();


//Rendering html
$view = new View();

//Rendering main page
//$view->render();


//Routing
$router = new Router($config);
$result = $router->run($_SERVER['REQUEST_URI'], $db);

if ( !$result ) {
    $router->run_404("I couldn't find what you were looking for! Try again?");
}

//Pass it to Router->run()
//Include Router



