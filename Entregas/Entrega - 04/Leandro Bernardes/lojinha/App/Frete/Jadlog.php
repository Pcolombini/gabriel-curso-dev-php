<?php

namespace App\Frete;

use App\Frete\Frete;

class Jadlog implements Frete
{
    //funcao para retornar calculo do frete
    public function getValue($preco){
        $value = $preco*0.02 - 11;

        if($value < 0 || $value == 0){
            $value = $preco + ($preco/2);
        }

        return $value;
    }

}


?>