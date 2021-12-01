<?php

require_once 'Model.php';


class Attachment extends Model{
    public $table = 'vg_attachents';
    
    public function __construct($db)
    {
        parent::__construct($db);
    }
    public function url(){
        $this->db->get($this->table, 'url');
    }
}