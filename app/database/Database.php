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

        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ];
        try{
            $dsn = 'pgsql:host=' . $this->host. 
                    ';port=' . $this->port .
                        ';dbname=' . $this->db . 
                            ';user=' . $this->user . 
                                ';password=' . $this->password;

            $conn = new PDO($dsn, $opt);

            return $conn;
        } catch(PDOException $e){
            echo "Database connection error" . $e->getMessage();
            exit;
        }
        
    }
    //Create
    public function create($table, $values){
        $sql = 'insert into' . $table . 'values' . $values;

    }
    //Read
    public function get($table, $params = '*'){

        $sql = 'select ' . $params. ' from ' . $table;
        $res = $this->connect()->query($sql);
        
        return $res->fetchAll();
    }

    //Update

    //Delete
}