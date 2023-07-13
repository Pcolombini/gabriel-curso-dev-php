<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <span style="font-weight: bold; font-size: 20px;">Lista de Clientes</span>
    <a href="?page=form"><button style="margin: 10px;">Cadastrar</button></a>
    <table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php
        $con = new Connection();
        
        foreach($con->getClientes() as $cliente)
        {
            echo("<tr>");
            echo('
            <td>'.$cliente["nome_cliente"].'</td>
            <td>'.$cliente["telefone_cliente"].'</td>
            <td>'.$cliente["email_cliente"].'</td>
            <td>
                <a href="?page=form&id='.$cliente["id_cliente"].'"><button>Atualizar</button></a>
                <a href="?page=delete&id='.$cliente["id_cliente"].'"><button>Deletar</button></a>
            </td>
            ');
            echo("</tr>");
        }
    ?>
    </table> 
</body>
</html>
<?php

require 'leased.php';

?>