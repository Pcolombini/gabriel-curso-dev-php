<?php

include 'config.php';

use App\Compra;
use App\Frete\Fretes;
use App\Produto;
use App\SendEmail;

$produto = filter_input(INPUT_POST,'idProduto',FILTER_SANITIZE_NUMBER_INT);
$thisFrete = filter_input(INPUT_POST,'idFrete',FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST,'email');

$prod = new Produto();
$fretes = new Fretes();


if($_POST){

    $valorP = (double)$prod->getProduto($produto)[0]["valor_produto"];
    $nomeProd = $prod->getProduto($produto)[0]["nome_produto"];

    $classname = $fretes->getInstancia($thisFrete);
    $valorF = $classname->getValue($valorP);

    $total = $valorF+$valorP;

    $con = new Compra();
    $emailS = new SendEmail();

    $con->insertCompra(1,$produto,$thisFrete);

    if($emailS->send($email,$valorF,$total,$nomeProd)){
        $batata= json_encode(array(
            'frete'=>$valorF
        ));
        echo($batata);
        die;
    }else{
        echo 'fail';
    }
}

?>