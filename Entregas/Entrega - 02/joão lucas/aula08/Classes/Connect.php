<?php

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

    private function select(\PDOStatement $sth)
    {
        if ($this->executeQuery($sth)) {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    private function insert(\PDOStatement $sth)
    {
        if ($this->executeQuery($sth)) {
            return $this->con->lastInsertId();
        }
    }

    private function executeQuery(\PDOStatement $sth)
    {
        return $sth->execute();
    }

    public function getClientes()
    {
        $con = $this->con;
        $rs = $con->prepare("SELECT clientes.id_cliente, clientes.nome_cliente, clientes.telefone_cliente, clientes.email_cliente FROM clientes WHERE clientes.exc_clliente <> 'V'");


        return $this->select($rs);
    }

    public function deleteCliente($id)
    {
        $con = $this->con;
        $rs = $con->prepare("UPDATE clientes SET clientes.exc_clliente = 'V' WHERE clientes.id_cliente = :id");
        $rs->bindParam('id', $id);

        return $this->executeQuery($rs);
    }

    public function save($post){
        var_dump($post['action'] == "update;");

        if($post['action'] == "update;"){
                return $this->alterar($post['fname'],$post['tel'],$post['email'],$post['id']);
        }else {
                return $this->cadastrar($post['fname'],$post['tel'],$post['email']);
        }
        

    }

    public function alterar($nome,$telefone,$email,$id)
    {
        $con = $this->con;
        $rs = $con->prepare("UPDATE clientes SET nome_cliente = :nome , telefone_cliente = :telefone , email_cliente = :email WHERE id_cliente = :id");
        $rs->bindParam('nome',$nome);
        $rs->bindParam('telefone',$telefone);
        $rs->bindParam('email',$email);
        $rs->bindParam('id',$id);

        return $this->executeQuery($rs);
    }

    public function clientes($id){
        $con = $this->con;
        $rs = $con->prepare("SELECT clientes.id_cliente, clientes.nome_cliente, clientes.telefone_cliente, clientes.email_cliente FROM clientes WHERE clientes.id_cliente = :id");
        $rs->bindParam('id', $id);

        return $this->select($rs);
    }

    public function cadastrar($nome,$telefone,$email){
        $con = $this->con;
        $rs = $con->prepare("INSERT INTO clientes (id_cliente, nome_cliente, telefone_cliente, email_cliente, exc_clliente) VALUES(null, :nome,:telefone,:email,'F')");
        $rs->bindParam('nome',$nome);
        $rs->bindParam('telefone',$telefone);
        $rs->bindParam('email',$email);

        return $this->executeQuery($rs);

    }

    public function tempoContar(){
        $con = $this->con;
        $rs = $con->prepare("SELECT locacoes.devolucao_realizada_locacao, clientes.nome_cliente, DATEDIFF (locacoes.date_devolucao_locacao, locacoes.data_locacao) as qntd_tempo
        FROM clientes JOIN locacoes ON clientes.id_cliente = locacoes.fk_id_cliente_clientes WHERE clientes.exc_clliente <> 'V'");

        return $this->select($rs);
    }
}
