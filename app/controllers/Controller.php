<?php
require_once 'ViewController.php';
require_once BASEDIR . DS . 'app/models/Assignment.php';

// YEAH!!! ABSTRACT CLASS!!! WOOOOOOOOT!!! =D
abstract class Controller{
    public $view; //ViewController to render pages
    public $names; //Routes names array
    //public $db; //Database connection -- if you can comment it out, you can delete it =P
    public $assignment; //Assignment model

    public function __construct(Array $names, Object $db)
    {
        $this->view = new View();
        $this->assignment = new Assignment($db);
        //$this->db = $db;
        //Bootstrapping route names
        $this->names = $names;
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