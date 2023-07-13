<?php
 
class Connection
{
    
    private $conn;

    //metodo construtor
    public function __construct(){
        $this->conn = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PWD);
    }


    //metodo para rodar os selects
    private function select(\PDOStatement $sth){
        if($this->executeQuery($sth)){
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    //metodo para rodar os insert
    private function insert(\PDOStatement $sth){
        if($this->executeQuery($sth)){
            return $this->conn->lastInsertId();
        }
    }

    //metodo para executar as query
    private function executeQuery(\PDOStatement $sth)
    {
        return $sth->execute();
    }

    //metodo para obter os estados
    public function getEstados(){
        $con = $this->conn;
        $stmt = $con->prepare("SELECT uf_estado FROM tbl_estados");

        return $this->select($stmt);
    }

    //metodo para obter os estados
    public function getVagas(){
        $con = $this->conn;
        $stmt = $con->prepare("SELECT * FROM tbl_vagas");

        return $this->select($stmt);
    }

    //metodo para obter as cidades
    public function getCidades(){
        $con = $this->conn;
        $stmt = $con->prepare("SELECT id_cidade,nome_cidade FROM tbl_cidades ORDER BY nome_cidade");

        return $this->select($stmt);
    }

    //insere no banco de dados
    public function insertCandidato($nome,$telefone,$email,$cidade,$vaga,$resumo,$idiomas,$loc){
        $con = $this->conn;
        $stmt = $con->prepare("INSERT INTO tbl_candidatos(nome_candidato, phone_candidato, email_candidato, fk_id_cidade_cidades, fk_id_vaga_vagas, resumo_candidato, idiomas_candidato, local_candidato) 
        VALUES(:nome, :telefone, :email, :cidade, :vaga, :resumo, :idiomas, :loc)");
        $stmt->bindParam('nome',$nome);
        $stmt->bindParam('telefone',$telefone);
        $stmt->bindParam('email',$email);
        $stmt->bindParam('cidade',$cidade);
        $stmt->bindParam('vaga',$vaga);
        $stmt->bindParam('resumo',$resumo);
        $stmt->bindParam('idiomas',$idiomas);
        $stmt->bindParam('loc',$loc);        

        return $this->insert($stmt);
    }

    //pegando todos os candidatos
    public function getCandidatos(){
        $con = $this->conn;
        $stmt = $con->prepare("SELECT * FROM tbl_candidatos JOIN tbl_vagas ON fk_id_vaga_vagas = id_vaga
        JOIN tbl_cidades ON fk_id_cidade_cidades = id_cidade ORDER BY id_candidato ASC");

        return $this->select($stmt);
    }

    //pegando todos os candidatos
    public function getCandidato($param){
        $con = $this->conn;
        $stmt = $con->prepare("SELECT * FROM tbl_candidatos JOIN tbl_vagas ON fk_id_vaga_vagas = id_vaga
        JOIN tbl_cidades ON fk_id_cidade_cidades = id_cidade WHERE id_candidato = :idC");
        $stmt->bindParam('idC',$param);

        return $this->select($stmt);
    }

    //atualizando candidato
    public function attCandidato($id,$nome,$telefone,$email,$cidade,$vaga,$resumo,$idiomas,$loc){
        $con = $this->conn;
        $stmt = $con->prepare("UPDATE tbl_candidatos SET nome_candidato=:nome,phone_candidato=:telefone,
        email_candidato=:email,fk_id_cidade_cidades=:cidade,fk_id_vaga_vagas=:vaga,resumo_candidato=:resumo,idiomas_candidato=:idiomas,local_candidato=:loc WHERE id_candidato = :id");
        $stmt->bindParam('nome',$nome);
        $stmt->bindParam('telefone',$telefone);
        $stmt->bindParam('email',$email);
        $stmt->bindParam('cidade',$cidade);
        $stmt->bindParam('vaga',$vaga);
        $stmt->bindParam('resumo',$resumo);
        $stmt->bindParam('idiomas',$idiomas);
        $stmt->bindParam('loc',$loc);
        $stmt->bindParam('id',$id);  

        $a = $this->executeQuery($stmt);
        
        return $a;
    }

    //deletar
    public function deleteCandidato($id){
        $con = $this->conn;
        $stmt = $con->prepare("DELETE FROM tbl_candidatos WHERE id_candidato = :id");
        $stmt->bindParam('id',$id);

        return $this->executeQuery($stmt);
    }
}

?>