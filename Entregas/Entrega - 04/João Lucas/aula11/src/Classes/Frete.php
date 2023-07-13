<?php

namespace Joaolucas\Frete\Classes;

class Frete extends Connect
{

    public function getFrete(){
        $con = $this->getConnect();
        $rs = $con->prepare("SELECT id_frete, nome_frete FROM fretes");

        return $this->select($rs);
    }
}
