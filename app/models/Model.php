<?php

abstract class Model{
    protected $db;
    protected $table_name;
    public function __construct($db)
    {
        $this->db = $db;
        $this->table_name = 'vg_' . lcfirst(get_class($this)) . 's'; //Used for universal columns (id, time)
    }
    
    public function id($cond = []) //Returns an array od ids
    {
        
        $ids = $this->db->get($this->table_name,'id', $cond);
        return $ids;
    }
    public function timestamp($cond = []) //Returns an array of timestamps
    {
        $ids = $this->db->get($this->table_name,'created_at', $cond);
        return $ids;
    }
    public function create(Array $vals){
        
        $fields = '';
        //$values = array();
        foreach($vals as $field=>$val){
            $fields .= empty($fields) ? '':', ';
            $fields .= $field;
            //array_push($values, ':' . $vals);
            $vals[':' . $field] = $vals[$field];
            unset($vals[$field]);
        }
        //var_dump($vals);
        $this->db->create($this->table_name, $fields, $vals);
    }
    
}

//->where

//=/>