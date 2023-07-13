<?php

class Connection
{

    private $conn;

    //metodo construtor
    public function __construct()
    {
        $this->conn = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PWD);
    }

    //metodo para rodar os selects
    private function select(\PDOStatement $sth)
    {
        if($this->executeQuery($sth))
        {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    //metodo para rodar os insert
    private function insert(\PDOStatement $sth)
    {
        if($this->executeQuery($sth))
        {
            return $this->conn->lastInsertId();
        }
    }

    //metodo para executar as query, DELETE E UPDATE NAO RETORNAM
    private function executeQuery(\PDOStatement $sth)
    {
        return $sth->execute();
    }

    //funcoes para utilizar
    public function getClientes()
    {
        $con = $this->conn;
        $stmt = $con->prepare("SELECT * FROM clientes WHERE exc_clliente = 'F'");

        return $this->select($stmt);
    }

    //recupera usuario especifico
    public function getCliente($id)
    {
        $con = $this->conn;
        $stmt = $con->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
        $stmt->bindParam('id',$id);

        return $this->select($stmt);
    }

    //excluir usuario
    public function deleteCliente($id)
    {
        $con = $this->conn;
        $stmt = $con->prepare("UPDATE clientes SET exc_clliente = 'V' WHERE id_cliente = :id");
        $stmt->bindParam('id',$id);

        $a = $this->executeQuery($stmt);
        return $a;
    }

    //atualizar usuario
    public function attCliente($id,$nome,$email,$telefone)
    {
        $con = $this->conn;
        $stmt = $con->prepare("UPDATE clientes SET nome_cliente = :nome, email_cliente = :email, telefone_cliente = :telefone 
        WHERE id_cliente = :id");
        $stmt->bindParam('nome',$nome);
        $stmt->bindParam('email',$email);
        $stmt->bindParam('telefone',$telefone);
        $stmt->bindParam('id',$id);

        $a = $this->executeQuery($stmt);
        
        return $a;
    }

    //inserir usuario
    public function insertCliente($nome,$email,$telefone)
    {
        $con = $this->conn;
        $stmt = $con->prepare("INSERT INTO clientes(nome_cliente, telefone_cliente, email_cliente) 
        VALUES (:nome,:telefone,:email)");
        $stmt->bindParam('nome',$nome);
        $stmt->bindParam('telefone',$telefone);
        $stmt->bindParam('email',$email);

        return $this->insert($stmt);
    }


    //listar filmes locados e tempos locados
    public function getLocados()
    {
        $con = $this->conn;
        $stmt = $con->prepare("SELECT nome_cliente,nome_filme,DATEDIFF(date_devolucao_locacao,data_locacao) AS duraLocacao,
        devolucao_realizada_locacao AS devolvido
        FROM locacoes 
        JOIN clientes ON id_cliente = fk_id_cliente_clientes
        JOIN filmes ON id_filme = fk_id_filme_filmes");

        return $this->select($stmt);
    }

}

?>