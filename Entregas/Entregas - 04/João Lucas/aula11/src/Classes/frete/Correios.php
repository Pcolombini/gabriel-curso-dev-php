<?php

namespace Joaolucas\Frete\Classes\frete;

use Joaolucas\Frete\Classes\Connect as ClassesConnect;

class Correios extends ClassesConnect implements Frete 
{

    public function getValue($preco){
        $valor = sqrt(16) * (0.1 * $preco) + 1.70;

        if($valor < 0 ){
            $valor = $preco / 2;
        }

        $valort = $valor + $preco;

        return $valort;
    }


}
