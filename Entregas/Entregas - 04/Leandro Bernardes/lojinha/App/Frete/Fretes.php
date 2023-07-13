<?php

namespace App\Frete;

use App\Connection;

class Fretes extends Connection
{
    public $fretesDisp = array('1'=>'Correios','2'=>'Jadlog','3'=>'Tnt');


    //retorna todos os fretes
    public function getFretes(){
        $rs = $this->con->prepare("SELECT * FROM tbl_fretes");

        return $this->select($rs);
    }

    //metodo para pegar instancia
    public function getInstancia($classname){
        switch($classname){
            case 1:
                return new Correios();
                //$valorF = $correios->getValue($valorP);
                break;
            case 2:
                return new Jadlog();
                //$valorF = $jadlog->getValue($valorP);
                break;
            case 3:
                return new Tnt();
                //$valorF = $tnt->getValue($valorP);
                break;
        }
    }
}

?>