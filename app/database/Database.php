<?php

//Main database actions class

class Database{

    protected $host;
    protected $user;
    protected $password;
    protected $db;
    protected $port;
    public function __construct(Array $db_data)
    {
        $this->host = $db_data['host'];
        $this->user = $db_data['user'];
        $this->password = $db_data['password'];
        $this->db = $db_data['db'];
        $this->port = $db_data['port'];

    }
    public function connect(){
        try{
            $dsn = 'pgsql:host=' . $this->host. 
                    ';port=' . $this->port .
                        ';dbname=' . $this->db . 
                            ';user=' . $this->user . 
                                ';password=' . $this->password;

            $conn = new PDO($dsn);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

            return $conn;
        } catch(PDOException $e){
            echo "Database connection error" . $e->getMessage();
            exit;
        }
        
    }
    //Used to form additional conditions
    public function condition($cond, $join){
        $where_str = ''; //String for additional sql

            foreach($cond as $col=>$val){
                $where_str .= empty($where_str) ? ' ' : $join; //Connecting conditions

                $where_str .= $col . "=:" . $col; //Forming prepared statement
                
                $cond[':' . $col] = $cond[$col]; //Reseting keys
                unset($cond[$col]);
            }
            return $where_str;
    }
    
    //Read
    public function get($table, $params = '*', $cond = []) //params - what you want to select
    {

        $sql = 'select ' . $params. ' from ' . $table;
        if(!empty($cond)) //Additional conditions
        {
            $where_str = $this->condition($cond, ' and ');
            $sql .= ' where ' .$where_str; //Add condition

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($cond); //Execute prepared statement
            $res = $stmt->fetchAll(); //Fetch results

        } else{
            $res = $this->connect()->query($sql)->fetchAll(); //Get all ids
        }
        return $res;

    }

    //Create
    public function create($table, $fields, $values) 
    {
        //Forming prepared statement
        $vals = '';
        $fields1 = explode(',', $fields);
        foreach($fields1 as $field){
            $vals .= empty($vals) ? '' : ', ';
            $vals .= ':' . trim($field);
        }

        //Query
        $sql = 'insert into ' . $table . '(' . $fields . ') ' . 'values' . '(' .$vals .')';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($values);
    }

    //Update
    public function update($table , $id, $vals)
    {
        $str = $this->condition($vals, ',');
       
        $vals['id'] = $id;

        $sql = 'update ' . $table . ' set ' . $str . $col . ' where id=:id';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($vals);
    }
    //Delete
    public function delete($table, $id)
    {
        $sql = 'delete from ' . $table . ' where id=:id';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([':id'=>$id]);
    }
}