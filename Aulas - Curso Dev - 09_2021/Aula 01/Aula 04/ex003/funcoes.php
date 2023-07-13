<?php 

function captura(){
    $dados = array();
    if(isset($dados)){
        $dados [] = filter_input(INPUT_GET,'nome');
    }
}
