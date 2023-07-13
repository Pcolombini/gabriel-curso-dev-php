<?php

$nome = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$cidade = filter_input(INPUT_POST, 'userCidade',FILTER_SANITIZE_STRING);
$vaga = filter_input(INPUT_POST, 'userVaga',FILTER_SANITIZE_STRING);
$rsmPro = filter_input(INPUT_POST, 'userResumo',FILTER_SANITIZE_STRING);
$ingles = filter_input(INPUT_POST, 'userIngles',FILTER_SANITIZE_STRING);
$espanhol = filter_input(INPUT_POST, 'userEspanhol',FILTER_SANITIZE_STRING);
$sim = filter_input(INPUT_POST, 'userSim',FILTER_SANITIZE_STRING);
$nao = filter_input(INPUT_POST, 'userNao',FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'userType', FILTER_SANITIZE_STRING);

$con = new Connection();
$doc = new MakeXML();

$idiomas = "";

$idiomas .= $ingles == "true" ? 'ingles ' : '';
$idiomas .= $espanhol == "true" ? 'espanhol' : '';

if($sim == "true"){
    $disp = 'V';
}else{
    $disp = 'F';
}

if($_POST){
    if ($type == 'update') {
        $con->attCandidato($id, $nome, $telefone, $email, $cidade, $vaga, $rsmPro, $idiomas, $disp);
    } else if ($type == 'insert') {
        $id = $con->insertCandidato($nome, $telefone, $email, $cidade, $vaga, $rsmPro, $idiomas, $disp);
    }
}

$doc->criandoXML($id,$nome, $telefone, $email, $cidade, $vaga, $rsmPro, $idiomas, $disp);

?>