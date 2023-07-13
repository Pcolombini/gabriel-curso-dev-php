<?php

require "config.php";
// // retorno de clientes ativos
// $con = new Connect() ;
// $clientes = $con->getClientesAtivo();

// var_dump($clientes);

// // foreach($clientes as $cli) {
// // echo "<tr>";
// // echo "<td>" . $cli["cliente_ativo"]."</td>";
// // echo "</tr>";


// // }


// echo "<hr>";


// $con = new Connect() ;
// $rs = $con->getGeneroFilmes();

// var_dump($rs);


echo "<hr>";

$con = new Connect() ;
$rs = $con->getNuncaAlugados();

var_dump($rs);


echo "<hr>";

$con = new Connect() ;
$rs = $con->getClienteseFilmes();

var_dump($rs);


echo "<hr>";

$telefone = "993068479";
$email = "fernandorluiz@gmail.com";
$id = "";