<?php

abstract class Model
{
    protected $db;
    protected $table_name;

    public function __construct($db)
    {
        $this->db = $db;
        $this->table_name = 'vg_' . lcfirst(get_class($this)) . 's'; //Used for universal columns (id, time)
    }

    public function form_cond(Array $cond){
        $arr = array();
        foreach ($cond as $stmt){
            $str = $stmt[0] . $stmt[1] . $stmt[2];
            array_push($arr, $str);
        }
        return $arr;
    }

    public function id($cond = []) //Returns an array od ids
    {
        // 
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
        foreach($vals as $field=>$val){
            $fields .= empty($fields) ? '':', ';
            $fields .= $field;
            $vals[':' . $field] = $vals[$field];
            unset($vals[$field]);
        }
        $this->db->create($this->table_name, $fields, $vals);
    }
    
    //Update row (by id)
    public function update($id, Array $upload_data){
        var_dump(
            $this->db->update(
                $this->table_name, $id,$upload_data));
    }

    //Delete row (by id)
    public function delete($id)
    {
        $this->db->delete($this->table, $id);
    }
}
