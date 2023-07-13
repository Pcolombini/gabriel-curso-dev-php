<?php 
header("Content-type:text/html; charset=utf8");
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

//if e else

if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($cidade) && !empty($estado) && !empty($rpro)){

    echo "<h1>Sucesso!</h1>";
    echo "<h3>Informações preenchidas: </h3>";
    echo "<h3>Seu nome: " . $nome . ".</h3>";
    echo "<h3>Seu número de telefone: " . $telefone . ".</h3>";
    echo "<h3>Seu email " . $email . ".</h3>";
    echo "<h3>Sua cidade " . $cidade . ", e seu estado " . $estado . ".</h3>";
    echo "<h3>Seu resumo profissional " . $rpro . ".</h3>";

    if ($ing && $spain){
        echo "<h3>Idiomas falados: Inglês e espanhol.</h3>";
    }else if($ing){
        echo "<h3>Idioma falado: Inglês.</h3>";
    }else if($spain){
        echo "<h3>Idioma falado: Espanhol.</h3>";
    }else{
        echo "<h3>Nenhum outro idioma falado.</h3>";
    }

    if($sim){
        echo "<h3>Disponibilidade para trabalhar presencialmente.</h3>";
    }else {echo "<h3>Sem disponibilidade para trabalhar presencialmente.</h3>";}

}else {
    header('location:index.php');
}

echo "<a href='index.php'><button>Voltar</button>";

//Arquivo xml
$xml = '?xml version = "1.0" encoding = "UTF-8"?';
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


$xml .= '</links>';

//escrever no arquivo
$fp = fopen ('meus_links.xml','w+');
fwrite($fp, $xml);
fclose($fp);
?>



