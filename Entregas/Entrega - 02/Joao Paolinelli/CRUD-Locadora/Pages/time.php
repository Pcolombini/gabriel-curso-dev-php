<?php
include 'list.php';
    $objeto = new Connect();
    $verHistorico =filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_STRING);

    $getDiasfromDelay = $objeto->getUsuario_tempoFilmeAlugado($verHistorico);

    foreach($getDiasfromDelay as $chave => $campo) {
        echo '<hr>'.$campo['data_locacao'].'<br>Filme: '.$campo['nome_filme'].'<br>Tempo com o filme: '.$campo['dias_com_filme'].' dias</p> <hr><br>';
    }

?>




