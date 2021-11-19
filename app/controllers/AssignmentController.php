<?php
require_once 'Controller.php';

class Assignments extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        $this->view->render('main/start');

    }

    public function add(){
        $this->view->render('assignment/index');

    }

    public function send(){
        $this->name('control');
    }
}