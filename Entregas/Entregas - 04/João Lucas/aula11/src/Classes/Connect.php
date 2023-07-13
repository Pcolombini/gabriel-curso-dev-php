<?php

namespace Joaolucas\Frete\Classes;

class Connect
{
    private $con;

    public function __construct()
    {
        $this->con = new \PDO(
            "mysql:host=" . DB_HOST . ";
            dbname=" . DB_NAME,
            DB_USER,
            DB_PWD
        );
    }

    public function getConnect()
    {
        return $this->con;
    }

    protected function select(\PDOStatement $sth)
    {
        if ($this->executeQuery($sth)) {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    protected function insert(\PDOStatement $sth)
    {
        if ($this->executeQuery($sth)) {
            return $this->con->lastInsertId();
        }
    }

    protected function executeQuery(\PDOStatement $sth)
    {
        return $sth->execute();
    }
}
