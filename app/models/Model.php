<?php

abstract class Model{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function id(){

    }
    public function timestamp(){
        
    }
}