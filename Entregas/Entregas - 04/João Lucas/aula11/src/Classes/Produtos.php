<?php

namespace Joaolucas\Frete\Classes;

class Produtos extends Connect
{
    public function produto($id){
        $con = $this->getConnect();
        $rs = $con->prepare("SELECT valor_produto FROM produtos WHERE id_produto = :id");
        $rs->bindParam('id',$id);

        return $this->select($rs);
        
    }

    public function getProdutos(){
        $con = $this->getConnect();
        $rs = $con->prepare("SELECT id_produto, nome_produto, valor_produto FROM produtos");

        return $this->select($rs);
    }


}
