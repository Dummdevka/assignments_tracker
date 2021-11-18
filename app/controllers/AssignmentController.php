<?php

require_once 'Controller.php';

class Assignments extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        echo "get method!";
        $this->view->render('assignment/index.php');
    }

    public function add(){
        echo "add assignments!";

    }
}