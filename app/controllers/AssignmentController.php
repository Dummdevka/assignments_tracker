<?php
require_once 'Controller.php';

class Assignments extends Controller{
    public function __construct($names, $db)
    {
        parent::__construct($names, $db);
    }

    public function get(){
        $data = $this->db->get('vg_assignments', 'title');
        $this->view->render('main/start', $data);

    }

    public function add(){
        $this->view->render('assignment/index');

    }

    public function send(){
        $this->name('control');
    }
}