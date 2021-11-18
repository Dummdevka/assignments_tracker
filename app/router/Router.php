<?php



//Routering the site
class Router{
    public $routes;
    public function __construct()
    {
        $this->routes = require_once 'routes.php';
    }

    public function run($query){

        //Checking whether the route exists
        if(!array_key_exists($query, $this->routes)){
            return false;
        } else{

            //Calling class
            $route = $this->routes[$query];
            $class = new $route['class']();

            //If there is a method
            if(array_key_exists('method',$route)&&
            method_exists($class, $route['method'])){
                
                //Calling the method
                $method = $route['method'];
                $class->$method();
            } 
        }
    }
}