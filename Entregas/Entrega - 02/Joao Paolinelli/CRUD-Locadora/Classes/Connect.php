<?php

class Connect 
{
    //metodos magicos comecam com : __
    private $con;

    public function __construct(){
        //pesquisando namespace(pacote) PDO
        $this->con = new \PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PWD
        );
    }

    //return todos filmes
    public function getMovies(){
        $con = $this->con;
        $rs = $con->prepare("SELECT * FROM filmes");

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    //return filme, : param: nome
    public function getMovieByName(String $name) {

        $con = $this->con;
        $rs = $con->prepare("SELECT * FROM filmes WHERE nome_filme = :nameMovie");
        $rs -> bindParam('nameMovie', $name);
        //bindParam faz a sanitizacao da querie. (Previne scripts no SQL)

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetch();
            }
        }
    }

    //return: cliente, param: ID
    public function getClienteByID($clienteID) {
        $con = $this->con;
        $rs = $con->prepare(
        "SELECT nome_cliente, telefone_cliente, email_cliente 
        FROM clientes 
        WHERE id_cliente = :clienteID");
        $rs -> bindParam('clienteID', $clienteID);

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    //Questao01
    public function getClienteAtivo() {
        $con = $this->con;
        $clienteAtivo = "V";
        $rs = $con->prepare("SELECT * FROM clientes WHERE exc_clliente = :clienteAtivo");
        $rs -> bindParam('clienteAtivo', $clienteAtivo);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }

    }

    //Questao02
    public function getFilmeByGenero() {
        $con = $this->con;
        $clienteAtivo = "V";
        $rs = $con->prepare("SELECT generos.nome_genero,filmes.nome_filme
                            FROM filmes JOIN generos ON filmes.fk_id_genero_generos = generos.id_genero
                            GROUP BY generos.nome_genero,filmes.nome_filme");
        // $rs -> bindParam('clienteAtivo', $clienteAtivo);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    //Questao03
    public function getNuncaLocados() {
        $con = $this->con;
        // $clienteAtivo = "V";
        $rs = $con->prepare("
        SELECT nome_filme
        FROM filmes
        WHERE id_filme NOT IN (SELECT fk_id_filme_filmes FROM locacoes) ");
        // $rs -> bindParam('clienteAtivo', $clienteAtivo);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    //Questao04
    public function getClientesFilmes() {
        $con = $this->con;
        // $clienteAtivo = "V";
        $rs = $con->prepare("
        SELECT nome_cliente,nome_filme
        FROM locacoes JOIN clientes  ON locacoes.fk_id_cliente_clientes = clientes.id_cliente
        JOIN filmes ON locacoes.fk_id_filme_filmes = filmes.id_filme
        GROUP BY nome_cliente,nome_filme");
        // $rs -> bindParam('clienteAtivo', $clienteAtivo);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    //Questao05
    public function getCliente($chave, $valor) {

        $array = array(
            'id' => 'id_cliente',
            'telefone' => 'telefone_cliente',
            'email' => 'email_cliente'
        );
        // var_dump($array[$chave]);

        $con = $this->con;
        $rs = $con->prepare('
        SELECT *
        FROM clientes
        WHERE '.$array[$chave].' = :filtro');
       
        $rs -> bindParam('filtro', $valor);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }

    }

    //Questao06
    public function getClientes_generoTerror() {
        $con = $this->con;
        // $clienteAtivo = "V";
        $rs = $con->prepare("
        SELECT clientes.nome_cliente, filmes.nome_filme, filmes.fk_id_genero_generos
        FROM clientes JOIN locacoes on clientes.id_cliente = locacoes.fk_id_cliente_clientes
        JOIN filmes ON filmes.id_filme = locacoes.fk_id_filme_filmes
        GROUP BY clientes.nome_cliente, filmes.nome_filme, filmes.fk_id_genero_generos
        HAVING filmes.fk_id_genero_generos = 1");
        // $rs -> bindParam('clienteAtivo', $clienteAtivo);

        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    //Questao07
    public function getCliente_atrasoDevolucao() {
        $con = $this->con;
        $rs = $con->prepare("
        SELECT clientes.id_cliente, clientes.nome_cliente, filmes.nome_filme, locacoes.devolucao_realizada_locacao
        FROM clientes JOIN locacoes ON clientes.id_cliente = locacoes.fk_id_cliente_clientes 
        AND locacoes.devolucao_realizada_locacao = 'F'
        JOIN filmes ON filmes.id_filme = locacoes.fk_id_filme_filmes");
        if($rs-> execute()) {
            if($rs->rowCount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    //Questao08
    // public function getGenero_maisAlugados() {
    // }

    //Questao09
    public function getGenero_duracaoMedia() {
        $objeto = new Connect();
        $con = $this->con;

        $rs = $con->prepare(
        'SELECT generos.nome_genero, AVG(filmes.duracao_filme) as MEDIA_MINUTOS
        FROM generos JOIN filmes
        ON filmes.fk_id_genero_generos = generos.id_genero
        GROUP BY generos.nome_genero');

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : FALSE;


    }

    private function insert(\PDOStatement $sth) {
        if($this->executeQuery($sth)) {
            return $this->con->lastInsertId();
        }

    }

    private function executeQuery(\PDOStatement $sth) {
        return $sth->execute();
    }

    //return: cliente atualizado, param: array com informacoes cliente
    public function editarPerfil($dados) {
        
        $con = $this->con;
        $rs = $con->prepare(
        'UPDATE clientes 
        SET nome_cliente = :nick, telefone_cliente = :phone, email_cliente = :mail
        WHERE id_cliente = :idCliente');
        
        $rs -> bindParam('nick', $dados['nameCliente']);
        $rs -> bindParam('phone', $dados['phoneCliente']);
        $rs -> bindParam('mail', $dados['emailCliente']);
        $rs -> bindParam('idCliente', $dados['id']);
        
        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function inserirCliente($a) {
        
        $con = $this->con;
        $ativo = 'V';
        $rs = $con->prepare(
        "INSERT INTO clientes(nome_cliente,telefone_cliente, email_cliente, exc_clliente)
        VALUES(:nick,:phone,:mail,:ativo)");
        $rs->bindParam('nick', $a['nameCliente']);
        $rs->bindParam('phone',$a['phoneCliente']);
        $rs->bindParam('mail',$a['emailCliente']);
        $rs->bindParam('ativo', $ativo);

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function deletarCliente($id){
        $con = $this->con;
        $rs = $con->prepare(
        "UPDATE clientes 
        SET exc_clliente = 'F' 
        WHERE id_cliente = :idCliente");
        $rs->bindParam('idCliente',$id);

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
        
    }
    
   
    public function getUsuario_tempoFilmeAlugado($idCliente) {
        $con = $this->con;

        $rs = $con->prepare(
        "SELECT nome_filme, locacoes.data_locacao,DATEDIFF(locacoes.date_devolucao_locacao, locacoes.data_locacao) as dias_com_filme
        FROM clientes JOIN locacoes ON clientes.id_cliente = locacoes.fk_id_cliente_clientes
        AND clientes.id_cliente = :id 
        JOIN filmes ON filmes.id_filme = locacoes.fk_id_filme_filmes 
        AND locacoes.devolucao_realizada_locacao = 'V'
        GROUP BY nome_filme,locacoes.data_locacao,dias_com_filme");

        $rs ->bindParam('id',$idCliente);

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function getTempo_FilmeAlugado() {
        $con = $this->con;

        $rs = $con->prepare(
        "SELECT clientes.id_cliente, clientes.nome_cliente, locacoes.data_locacao, locacoes.date_devolucao_locacao
        FROM clientes JOIN locacoes ON locacoes.fk_id_cliente_clientes = clientes.id_cliente
        AND locacoes.devolucao_realizada_locacao = 'V'
        GROUP BY clientes.id_cliente, clientes.nome_cliente, locacoes.data_locacao, locacoes.date_devolucao_locacao  
        ORDER BY clientes.id_cliente  ASC");

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : FALSE;
    }

    public function array2Table($arrayFilme) {
        
        $a = array();
        foreach($arrayFilme as $arrayFilme) {
            $a[] .= '<p>Filme:'.$arrayFilme['nome_filme'].', '. 'Alugado: '.$arrayFilme['data_locacao'].' , 
            ' . 'Entrega: '.$arrayFilme['date_devolucao_locacao'].'</p> <br>';
        }

        return $a;
    }

    public function setClientesAtivos($idCliente) {
        $con = $this->con;
        $rs = $con ->prepare(
        "UPDATE clientes
        SET exc_clliente = 'V'
        WHERE id_cliente = :clienteID");

        $rs->bindParam("clienteID", $idCliente);

        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function getClientes_desativados() {
        $con = $this->con;
        $desativado = 'F';
        $rs = $con->prepare(
        "SELECT id_cliente,nome_cliente, telefone_cliente, email_cliente
        FROM clientes
        WHERE exc_clliente = :clienteDesativado");
        $rs -> bindParam('clienteDesativado', $desativado);
        return $rs->execute() ? $rs->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    
}
