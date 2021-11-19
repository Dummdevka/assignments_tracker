<?php

class View{
    public $layout = BASEDIR . DS . 'app' . DS . 'views' . DS . 'layout.php';
    // public $page = '/main/start.php';

    public function __construct()
    {
        
    }

    //Rendering pages [by default main page]
    public function render($page = 'main/start', $vars = []){
        require_once $this->layout;
    }

}