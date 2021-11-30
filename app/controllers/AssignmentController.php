<?php
require_once 'Controller.php';

class Assignments extends Controller{
    public function __construct($names, $db)
    {
        parent::__construct($names, $db);
    }
    public function home(){
        $this->view->render('main/home');
    }
    public function get(){
        $arr = [
            'subject' => 'Math'
        ];
        
        //$data = $this->assignment->create($tasks);
       $data = $this->assignment->get_all();
        
        $this->view->render('main/start', $data);

    }

    public function add(){
        $tasks = [
            'subject' => 'Math',
            'title' => 'Some Ass',
            'description' => 'Some desc',
            
        ];
        //$this->view->render('assignment/index');
        for($i=0;$i<9;$i++){
            $this->assignment->create($tasks);
        }

    }

    public function send(){
        $this->name('control');
    }
    public function delete(){

        //If no id had been passed
        if(empty($_GET['id'])){
            $this->name('control');
            http_response_code(404);
            exit;
        }

        //Deleting 
        $id = $_GET['id'];
        $this->assignment->delete($id);
        echo $id;
    }
}

