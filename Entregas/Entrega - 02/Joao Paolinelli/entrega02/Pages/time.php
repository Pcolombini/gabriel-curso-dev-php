<?php
//O arquivo deve calcular quanto tempo cada usuario ficou o filme locado
include 'list.php';
$objeto = new Connect();
    $page =filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_STRING);

    $getDiasfromDelay = $objeto->getUsuario_tempoFilmeAlugado($page);

    // var_dump($page); die;

    if(isset($page)){
        $filmesTratamento = $objeto->array2Table($getDiasfromDelay);

        echo '<script>$(document).ready(function(){
            $("#flip").click(function(){
              $("#panel").slideDown("slow");
            });
          }); </script>'
          .'<br><p>'. visualizarFilmes($filmesTratamento).'<hr>';
    }

    // var_dump($filmesTratamento);
    echo '<hr>'.'Its me';
    
    // var_dump($getDiasfromDelay);
    // echo '<hr>'.'Johnny Booooooooooooooooooooy';

    
    function visualizarFilmes($array) {

        
        
        foreach($array as $filmes) {
            echo $filmes;
        }
       
        
    }



