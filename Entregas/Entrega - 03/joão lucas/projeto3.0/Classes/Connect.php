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
        $rs = $con->prepare("SELECT id_candidato, nome_candidato, telefone_candidato, email_candidato, resumo_candidato,
                                 idiomas_candidato, disponivel_candidato,
                                cidades.nome_cidade, estados.nome_estado, vagas.nome_vaga 
                                FROM candidatos JOIN cidades ON cidades.id_cidade = candidatos.fk_id_cidade_cidades
                                JOIN estados ON estados.id_estado = cidades.fk_id_estado_estados 
                                JOIN vagas ON vagas.id_vaga = candidatos.fk_id_vaga_vagas");

        return $this->select($rs);
    }

    public function getEstados()
    {
        $con = $this->con;
        $rs = $con->prepare("SELECT id_estado, uf_estado FROM estados");

        return $this->select($rs);
    }

    public function getCidades()
    {
        $con = $this->con;
        $rs = $con->prepare("SELECT id_cidade, nome_cidade FROM cidades");

        return $this->select($rs);
    }

    public function candidatos($id)
    {
        $con = $this->con;
        $rs = $con->prepare("SELECT nome_candidato, telefone_candidato, email_candidato, resumo_candidato,
                                    idiomas_candidato, disponivel_candidato, cidades.nome_cidade,cidades.id_cidade, 
                                    estados.uf_estado, estados.id_estado, vagas.nome_vaga ,vagas.id_vaga
                                    FROM candidatos JOIN cidades ON cidades.id_cidade = candidatos.fk_id_cidade_cidades
                                    JOIN estados ON estados.id_estado = cidades.fk_id_estado_estados 
                                    JOIN vagas ON vagas.id_vaga = candidatos.fk_id_vaga_vagas WHERE id_candidato = :id");
        $rs->bindParam('id', $id);

        return $this->select($rs);
    }

    public function vagas()
    {
        $con = $this->con;
        $rs = $con->prepare("SELECT id_vaga, nome_vaga FROM vagas");

        return $this->select($rs);
    }

    public function alterar($nome, $telefone, $email, $cidade, $resumo, $idiomas, $vaga, $disponivel, $id)
    {
        $con = $this->con;
        $rs = $con->prepare("UPDATE candidatos SET nome_candidato = :nome , telefone_candidato = :telefone , 
                            email_candidato = :email, fk_id_cidade_cidades = :cidade, resumo_candidato = :resumo, 
                            idiomas_candidato = :idiomas, fk_id_vaga_vagas = :vaga, disponivel_candidato = :disponivel
                             WHERE id_candidato = :id");
        $rs->bindParam('nome', $nome);
        $rs->bindParam('telefone', $telefone);
        $rs->bindParam('email', $email);
        $rs->bindParam('id', $id);
        $rs->bindParam('cidade', $cidade);
        $rs->bindParam('resumo', $resumo);
        $rs->bindParam('idiomas', $idiomas);
        $rs->bindParam('vaga', $vaga);
        $rs->bindParam('disponivel', $disponivel);

        return $this->executeQuery($rs);
    }

    public function cadastrar($nome, $telefone, $email, $cidade, $resumo, $idiomas, $vaga, $disponivel)
    {
        $con = $this->con;
        $rs = $con->prepare("INSERT INTO candidatos (id_candidato, nome_candidato, telefone_candidato, 
                            email_candidato, resumo_candidato, idiomas_candidato, disponivel_candidato, 
                            fk_id_cidade_cidades, fk_id_vaga_vagas) VALUES 
                            (null,:nome,:telefone,:email,:resumo,:idiomas,:disponivel,:cidade,:vaga)");
        $rs->bindParam('nome', $nome);
        $rs->bindParam('telefone', $telefone);
        $rs->bindParam('email', $email);
        $rs->bindParam('cidade', $cidade);
        $rs->bindParam('resumo', $resumo);
        $rs->bindParam('idiomas', $idiomas);
        $rs->bindParam('vaga', $vaga);
        $rs->bindParam('disponivel', $disponivel);

        $o = $this->executeQuery($rs);
        var_dump($o);
        var_dump( $rs->queryString);
        die;
        return $this->executeQuery($rs);
    }

    public function save($post, $idiomas, $disponivel)
    {
        if ($post['action'] == "update;") {
            return $this->alterar($post['nome'], $post['telefone'], $post['email'], $post['cidade'], $post['rpro'], $idiomas, $post['vaga'], $disponivel, $post['id']);
        } else {
            return $this->cadastrar($post['nome'], $post['telefone'], $post['email'], $post['cidade'], $post['rpro'], $idiomas, $post['vaga'], $disponivel);
        }
    }

    public function deleteCandidato($id)
    {
        $con = $this->con;
        $rs = $con->prepare("DELETE FROM candidatos WHERE id_candidato = :id");
        $rs->bindParam('id', $id);

        return $this->executeQuery($rs);
    }
}
