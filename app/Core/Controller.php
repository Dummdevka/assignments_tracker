<?php
require_once 'app/Core/ViewController.php';
require_once BASEDIR . DS . 'app/models/Assignment.php';

abstract class Controller{
    public $view; //ViewController to render pages
    public $names; //Routes names array
    //public $db; //Database connection
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
    
    //Parse php://input
    public function get_post()
    {
        $rawPostData = file_get_contents("php://input");
        $postData = array();
        parse_str($rawPostData, $postData);
        return $postData;
    }

}