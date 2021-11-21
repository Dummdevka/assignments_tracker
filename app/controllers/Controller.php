<?php
require_once 'ViewController.php';

abstract class Controller{
    public $view;
    public $names;
    public $db;

    public function __construct(Array $names, Object $db)
    {
        $this->view = new View();
        $this->db = $db;
        //Bootstrapping route names
        $this->names = $names;
        // $this->names = require_once(BASEDIR . DS . 'app' . DS . 'config' . DS . 'routes_names.php');
    }

    //Routing by names
    public function name($name){
        
        if(!array_key_exists($name, $this->names)){
            var_dump('back');
        } else{
            $this->redirect($this->names[$name]);
        }

    }

    //Redirection
    public function redirect($route){
        header('Location: ' . BASEURL . $route );
        exit;
    }
}