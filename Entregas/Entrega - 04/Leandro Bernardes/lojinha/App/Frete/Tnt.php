<?php

namespace App\Frete;

use App\Frete\Frete;

class Tnt implements Frete
{
    //funcao para retornar calculo do frete
    public function getValue($preco){
        $value = $preco*0.0133;

        return $value;
    }

}


?>