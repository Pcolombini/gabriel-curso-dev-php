<?php
include 'config.php';   

//variaveis
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', );
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$cidade = filter_input(INPUT_POST, 'cidade',FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado',FILTER_SANITIZE_STRING);
$rpro = filter_input(INPUT_POST, 'rpro',FILTER_SANITIZE_STRING);
$ing = filter_input(INPUT_POST, 'ing');
$spain = filter_input(INPUT_POST, 'spain');
$sim = filter_input(INPUT_POST, 'sim');
$nao = filter_input(INPUT_POST, 'nao');



//Arquivo xml
$xml = '<?xml version = "1.0" encoding = "UTF-8"?>';
$xml .= '<links>';

//criando links
$meus_links = array();

$meus_links[0]['nome'] =  "Seu nome: " . $nome . ".";
$meus_links[0]['telefone'] = "Seu número de telefone: " . $telefone . ".";
$meus_links[0]['email'] = "Seu email " . $email . ".";
$meus_links[0]['cidade'] = "Sua cidade " . $cidade . ".";
$meus_links[0]['estado'] = "Seu estado " . $estado . ".";
$meus_links[0]['resumo_profissional'] = "Seu resumo profissional " . $rpro . ".";
$meus_links[0]['sim'] = $sim;
$meus_links[0]['nao'] = $nao;

    for($i = 0; $i < count($meus_links); $i++){
    $xml .= '<link>';
    $xml .= '<nome>' . $meus_links[0]['nome'] . '</nome>';
    $xml .= '<telefone>' . $meus_links[0]['telefone'] . '</telefone>';
    $xml .= '<email>' . $meus_links[0]['email'] . '</email>';
    $xml .= '<cidade>' . $meus_links[0]['cidade'] . '</cidade>';
    $xml .= '<estado>' . $meus_links[0]['estado'] . '</estado>';
    $xml .= '<resumo_profissional>' . $meus_links[0]['resumo_profissional'] . '</resumo_profissional>';

    if ($ing && $spain){
        $xml .= '<idioma>Idiomas falados: Inglês e espanhol.</idioma>';
    }else if($ing){
        $xml .= '<idioma>Idioma falado: Inglês.</idioma>';
    }else if($spain){
        $xml .= '<idioma>Idioma falado: Espanhol.</idioma>';
    }else{
        $xml .= '<idioma>Nenhum outro idioma falado.</idioma>';
    }

    if($sim){
        $xml .= '<disponibilidade>Disponibilidade para trabalhar presencialmente.</disponibilidade>';
    }else {
        $xml .= '<disponibilidade>Sem disponibilidade para trabalhar presencialmente.</disponibilidade>';
    }

    if($_POST['vaga'] == '1'){
        $xml .= '<vaga>Desenvolvedor Web</vaga>';
    }

    $xml .= '</link>';
}

$xml .= '</links>';

//escrever no arquivo
$fp = fopen ('arquivo'. $nome .'.xml','w+');
fwrite($fp, $xml);
fclose($fp);


if($_POST){

if(!empty($_POST['spain']) && empty($_POST['ing'])){
    $idiomas = "Espanhol";
}else if(!empty($_POST['spain']) && $_POST['ing']){
    $idiomas ="Inglês e espanhol";
}else if($_POST['ing'] && empty($_POST['spain'])){
    $idiomas = "Inglês";
}else{
    $idiomas = "Nenhum outro idioma falado.";
}

if($_POST['presen'] == "V"){
    $disponivel = "V";
}else {
    $disponivel = "F";
}
}

if ($_POST) {

    $con = new Connect();
    $data = $con->save($_POST,$idiomas,$disponivel);
    $msg = "Ação feita com sucesso!";
    echo json_encode(array('msg'=>$msg));
    die;
}
