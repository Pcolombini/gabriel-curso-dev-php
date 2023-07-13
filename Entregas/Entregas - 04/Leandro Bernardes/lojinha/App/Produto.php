<?php

namespace App;

class Produto extends Connection
{
    //retronando todos os produtos
    public function getProdutos(){
        $rs = $this->con->prepare("SELECT * FROM tbl_produtos");

        return $this->select($rs);
    }

    //retronando todos os produtos
    public function getProduto($id){
        $rs = $this->con->prepare("SELECT * FROM tbl_produtos WHERE id_produto = :id");
        $rs->bindParam('id',$id);

        return $this->select($rs);
    }

}

?>