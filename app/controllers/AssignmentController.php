<?php
require_once 'app/Core/Controller.php';

class Assignments extends Controller
{
    public function __construct($names, $db)
    {
        parent::__construct($names, $db);
    }

    public function home()
    {
        $this->view->render('main/home');
    }

    public function get()
    {
        $arr = [
            'subject' => 'Math'
        ];

        //Get all the assignments
        $data = $this->assignment->get_all();
        
        $this->view->render('main/start', $data);

    }

    public function add()
    {
        //Validate the inputs
        $title = trim($_POST['title']);
        $subject = trim($_POST['subject']);
        $description = trim($_POST['description']);
        if(!empty(trim($title))&&
        !empty(trim($subject))&&
        !empty(trim($description)))
        {
            $new_ass = [
                'title' => $title,
                'subject' => $subject,
                'description' => $description
            ];

            //Last inserted id
            $id = $this->assignment->create($new_ass);
        }

        $this->name('control');
    }

    public function send()
    {
        $this->name('control');
    }

    public function delete()
    {
        //If no id had been passed
        if(empty($_GET['id'])){
            $this->name('control');
            http_response_code(404);
        }

        //Deleting 
        $id = $_GET['id'];
        $this->assignment->delete($id);
        echo $id;
    }

    public function edit()
    {
        $id = $_GET['id'];
        //Get request info
        $postData = $this->get_post();
        //Validate input
        if(!empty($id) && !empty($postData)) 
        {
            //Update assignment
            $this->assignment->update($id, $postData);
            echo array_values($postData)[0];
        } else {
            http_response_code(422);
        }
    }
}

