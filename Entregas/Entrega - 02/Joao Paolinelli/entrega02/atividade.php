<?php
    include 'config.php';
    //http://localhost/aula08/?page=list
    //(1) retorna uma lista de clientes ativos
    

    $objeto = new Connect();
    $clientesAtivos = $objeto->getClienteAtivo();
    // var_dump($clientesAtivos);
    echo '<hr>';
    foreach($clientesAtivos as $clientes) {
        $idCliente = $clientes['id_cliente'];
        $nomeCliente = $clientes['nome_cliente'];
        $telefoneCliente = $clientes['telefone_cliente'];
        $emailCliente = $clientes['email_cliente'];
        $excClliente = $clientes['exc_clliente'];
        echo 
        '<table> 
            <tr>
                <td>'
                .$idCliente.'</td>'.'
                <td>'.$nomeCliente.'</td>'.'
                <td>'.$telefoneCliente.'</td>'.'
                <td>'.$emailCliente.'</td>'.'
                <td>'.$excClliente.'</td>'.'
            </tr>
        
        </table>';
    };

    $categoriaFilme = $objeto->getFilmeByGenero();
    // var_dump($categoriaFilme);

    $nuncaLocados = $objeto->getNuncaLocados();
    echo '<hr>';
    // var_dump($nuncaLocados);

    $clientes_filmes = $objeto->getClientesFilmes();

    // var_dump($clientes_filmes);

    echo '<hr>';

    
    $campo = "id";
    $valor = "3";
    

    $clienteID = $objeto-> getCliente($campo, $valor);
    echo '<hr>';
    // var_dump($clienteID);

    $clientes_generoTerror = $objeto->getClientes_generoTerror();
    echo '<hr>';
    // var_dump($clientes_generoTerror);

    $cliente_atrasoDevolucao = $objeto->getCliente_atrasoDevolucao();
    // var_dump($cliente_atrasoDevolucao);

    echo '<hr>';

    // $maisAlugados = $objeto->getGenero_maisAlugados();
    // var_dump($maisAlugados);

    echo '<hr>';


    $duracaoMedia = $objeto->getGenero_duracaoMedia();
    var_dump($duracaoMedia);



