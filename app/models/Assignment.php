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
    public function attachments(){

    }
}