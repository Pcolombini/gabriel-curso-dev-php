<?php

namespace Joaolucas\Frete\Classes\frete;

use Joaolucas\Frete\Classes\Connect as ClassesConnect;

class Jadlog extends ClassesConnect implements Frete 
{
    public function getValue($preco){
        $valor = (0.02 * $preco) - 11;
        
        if($valor < 0 ){
            $valor = $preco / 2;
        } 

        $valort = $valor + $preco;

        return $valort;
    }


}
