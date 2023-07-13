<?php

namespace App\Frete;

use App\Frete\Frete;

class Correios implements Frete
{
    //funcao para retornar calculo do frete
    public function getValue($preco){
        $value = (sqrt(16) * ($preco*0.1)) + 1.7;

        return $value;
    }

}


?>