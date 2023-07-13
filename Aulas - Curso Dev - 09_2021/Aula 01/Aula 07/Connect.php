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
    public function getmovies() {
        $con = $this->con;
        $rs = $con->prepare("SELECT * FROM filmes");

        if ($rs->execute()) {
            if ($rs->rowCount() > 0) {
                return $rs->fetch($rs);
            }
        }

        
    }
    public function getMovieByName(string $name) {
            $con = $this->con;
            $rs = $con->prepare("SELECT * FROM filmes WHERE nome_filme = :nameMovie");
            $rs->bindParam("nameMovie" , $name);
            //bindParam 

            if ($rs->execute()) {
                if ($rs->rowcount() > 0) {
                    return $rs->fetch($rs);

                }
            }
            
    }

    public function getClientesAtivo() {
        $cAtivo= "V";
        $con = $this->con;
        $rs = $con->prepare("SELECT * FROM clientes WHERE exc_clliente = :cAtivo");
        $rs->bindParam("cAtivo" , $cAtivo);
        if ($rs->execute()) {
            if ($rs->rowcount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);

            }
        }

        
    }

    public function getGeneroFilmes(){
    
        $con = $this->con;
        $rs = $con->prepare("SELECT * FROM filmes JOIN generos ON fk_id_genero_generos = id_genero");
        if ($rs->execute()) {
            if ($rs->rowcount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);

            }
        }
        
    }

    public function getNuncaAlugados(){
        
        $con = $this ->con;
        $rs = $con->prepare("SELECT * FROM filmes WHERE id_filme NOT IN (SELECT fk_id_filme_filmes FROM locacoes)");
        if ($rs->execute()) {
            if ($rs->rowcount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);

            }
        }
    }

    public function getClienteseFilmes(){

        $con = $this -> con;
        $rs = $con->prepare("SELECT * FROM locacoes JOIN clientes ON fk_id_cliente_clientes = id_cliente JOIN filmes ON id_filme = fk_id_filme_filmes");
        if ($rs->execute()) {
            if ($rs->rowcount() > 0) {
                return $rs->fetchAll(PDO::FETCH_ASSOC);

            }
        }

    }

    

}
