<?php

require_once 'Model.php';


class Assignment extends Model{

    public $table = 'vg_assignments';

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function title(){
        // $res = $this->db->get($this->table);
        return get_class($this);
    }
    public function subject(){

    }
    public function description(){

    }
    public function with_attachment($vals, $file){
        try {
            
            //Create task
            $id = $this->create($vals);

            $fields = 'ass_id, url';
            $file_data = ['url'=>$file, 'ass_id'=>$id];

            //Create attachent
            $this->db->create('vg_attachments', $fields, $file_data);

        }
        catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}