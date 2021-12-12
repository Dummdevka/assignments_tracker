<?php

class View
{
    public $template_dir, $layout;

    public function __construct($template_dir, $layout='layout.php')
    {
        $this->template_dir = $template_dir;
        $this->layout = $layout;
    }

    //Rendering pages [by default main page]
    public function render($page = 'main/start', $vars = [])
    {
        require_once $this->template_dir . $this->layout;
    }
}