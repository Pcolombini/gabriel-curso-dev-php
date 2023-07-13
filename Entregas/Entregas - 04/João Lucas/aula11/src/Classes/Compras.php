<?php

namespace Joaolucas\Frete\Classes;

class Compras extends Connect
{
    public function frete($id){
        $con = $this->getConnect();
        $rs = $con->prepare("SELECT nome_frete FROM fretes WHERE id_frete = :id");
        $rs->bindParam('id',$id);

        return $this->select($rs);
    }

    public function getTotal($valor,$id){
        $nomeFrete = $this->frete($id);

        $conexao = "Joaolucas\\Frete\\Classes\\frete" . '\\' . $nomeFrete[0]["nome_frete"];

        $frete = new $conexao;
        return $frete->getValue($valor);
    }

}
