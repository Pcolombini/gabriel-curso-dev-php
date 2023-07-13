<?php
    $objeto = new Connect();
    $cliente_off = filter_input(INPUT_GET, 'id_off',FILTER_SANITIZE_STRING);
    
    if($cliente_off) {
        $clientes_desativados = $objeto->setClientesAtivos($cliente_off);
        header('Location: ?page=list');
    }
?>
<html>
    <style>
      table{font-family: arial, sans-serif; border-collapse: collapse; width: 100%;}
      td,th {border: 1px solid #dddddd;text-align: left;padding: 8px;}
      tr:nth-child(even){background-color: #dddddd;}
    </style>
    
    <head>
        <body>
            <h3>Clientes desativados   |</h3>
            <a href="?page=list"><button>Voltar</button></a>
        </body>
    </head>
</html>

<?php

    $statusCliente = filter_input(INPUT_GET, 'exc_clliente', FILTER_SANITIZE_STRING);

    if($statusCliente) {
        $clientes_desativados = $objeto->getClientes_desativados();

        echo '<hr>';
        echo '<table>
            <tr>
                <th>Nome: </th>
                <th>Telefone: </th>
                <th>Email: </th>
                <th>Opcoes: </th>
            </tr>';
            
            foreach($clientes_desativados as $chave => $campos) {
                echo '<tr>
                <th>'.$campos['nome_cliente'].'</th>
                <th>'.$campos['telefone_cliente'].'</th>
                <th>'.$campos['email_cliente'].' </th>
                <th><a href="?page=desativado&id_off= '.$campos['id_cliente'].' ">Ativar</button></th>
                </tr>';
                
            };
            echo '</tr>';
        echo '</table>';
    }

?>