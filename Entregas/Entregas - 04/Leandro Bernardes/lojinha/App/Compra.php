<?php

namespace App;

class Compra extends Connection
{
    
    //insert compra
    public function insertCompra($idC,$idP,$idF){
        $rs = $this->con->prepare("INSERT INTO tbl_compras(fk_id_cliente_clientes, fk_id_produto_produtos, fk_id_frete_fretes) 
        VALUES (:idC,:idP,:idF)");
        $rs->bindParam('idC',$idC);
        $rs->bindParam('idP',$idP);
        $rs->bindParam('idF',$idF);

        return $this->insert($rs);
    }

}


?>