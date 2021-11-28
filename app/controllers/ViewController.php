<?php

class View
{
    public $layout;

    public function __construct($layout=false)
    {
        // What do you think about this change?
        $this->layout = $layout ?: BASEDIR . DS . 'app' . DS . 'views' . DS . 'layout.php';
    }

    //Rendering pages [by default main page]
    public function render($page = 'main/start', $vars = [])
    {
        require_once $this->layout; // this is wonderfully simple. Well done =]
    }
}
