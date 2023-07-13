<?php

use Joaolucas\Frete\Classes\EmailSend;

include 'config.php';

parse_str($_POST['formData'], $formData);

if($_POST){
$id = $formData['produto'];
$id_f = $formData['frete'];

$conp = new Joaolucas\Frete\Classes\Produtos;
$datap = $conp->produto($id);

$valor = $datap[0]["valor_produto"];

$con = new Joaolucas\Frete\Classes\Compras;
$data = $con->getTotal($valor,$id_f);


$msg = "<br>O valor do produto pelo frete é R$" . number_format($data, 2, ',', '') . ".";
echo json_encode(array('msg'=>$msg));

$email = $_POST['email'];
$nome = $formData['nome'];

var_dump($nome);

$conm = new EmailSend;
$datam = $conm->Send($nome,$email,number_format($data, 2, ',', ''));

}

?>