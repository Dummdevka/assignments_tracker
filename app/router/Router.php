<?php



//Routering the site
class Router
{
    public $routes;
    public function __construct(Array $config)
    {   
        $this->routes = $config['routes'];
        $this->names = $config['names'];
    }

    //Running the appliacation
    public function run($query, object $db)
    {
    
        //Iterate through the array
        foreach ($this->routes as $route => $vals){

            //Regular exp out of route array keys
            $regex = '#^\/[^/]*\\' . $route . '$#';
            
            if(preg_match($regex, $query)){
                if(class_exists($vals['class'])){

                    //Creating the class
                    $class = new $vals['class']($this->names, $db);

                    if ( method_exists($class, $vals['method'])) {

                        //Calling the method
                        $method = $vals['method'];
                        $class->$method();

                    }else{
                        var_dump("No func");
                    }
                } else{
                    var_dump("No class");
                }
            } 
        }
            header('HTTP/1.0 404 Not Found');
             exit;
}
}