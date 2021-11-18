<?php

require_once 'Controller.php';

class Assignments extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        echo "get assignments!";
    }

    public function add(){
        echo "add assignments!";

    }
}