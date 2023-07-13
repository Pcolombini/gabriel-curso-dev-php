<?php

namespace App;

class Connection
{
    protected $con;


    //metodo construtor
    public function __construct()
    {
        $this->con = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PWD);
    }


    //metodo para rodar os selects
    protected function select(\PDOStatement $sth)
    {
        if($this->executeQuery($sth))
        {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    //metodo para rodar os insert
    protected function insert(\PDOStatement $sth)
    {
        if($this->executeQuery($sth))
        {
            return $this->con->lastInsertId();
        }
    }

    
    //metodo para executar as query, DELETE E UPDATE NAO RETORNAM
    protected function executeQuery(\PDOStatement $sth)
    {
        return $sth->execute();
    }

}

?>