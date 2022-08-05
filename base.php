<?php
session_start();
date_default_timezone_set('Asia/Taipei');

class DB{
    protected $table;
    protected $dsn='mysql:host=localhost;charset=utf8;dbname=db20';
    protected $pdo;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'";
                }
                $sql .= " where " . join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg){
        $sql="select * from $this->table where";
        if(is_array($arg)){
            foreach($arg as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql .= join(" && ",$tmp);
        }else{
            $sql .= " `id`='$arg'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
}



?>