<?php
    $getID = filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_STRING);
    $objeto = new Connect();

    if($getID) {
        $comando = 'atualizar';
        $cliente = $objeto->getClienteByID($getID);
        $cliente = $cliente[0];
        // var_dump($cliente);

    }else { $comando = 'inserir';
    }
?>

<html>
 <head> <title>Teste PHP</title> </head>
    <body>
        <form method="POST" action="">
            <label for="nameCliente">Nome:</label><br>
            <input type="text" id="nameCliente" name="nameCliente" value="<?= !empty($getID) ? $cliente['nome_cliente'] : "" ?>"><br>
            <label for="phoneCliente">Telefone:</label><br>
            <input type="text" id="phoneCliente" name="phoneCliente" value="<?= !empty($getID) ? $cliente['telefone_cliente'] : "" ?>"><br>
            <label for="emailCliente">Email:</label><br>
            <input type="text" id="emailCliente" name="emailCliente" value="<?= !empty($getID) ? $cliente['email_cliente'] : "" ?>"><br><br>
            <input type="hidden" value="<?= $comando ?>" id="comando" name="comandoAcao">

            <a href="?page=link"><button type="submit" value="GO"><?= !empty($getID)? "Atualizar" : "Cadastrar" ?></button></a>
        </form>;
    </body>
</html>

<?php

    $a = array (
        'nameCliente' => filter_input(INPUT_POST, 'nameCliente', FILTER_SANITIZE_STRING),
        'phoneCliente' => filter_input(INPUT_POST, 'phoneCliente', FILTER_SANITIZE_STRING),
        'emailCliente' => filter_input(INPUT_POST, 'emailCliente', FILTER_VALIDATE_EMAIL)
    );   
    $toDO = filter_input(INPUT_POST, 'comandoAcao', FILTER_SANITIZE_STRING);

    if($_POST){
        if($toDO == 'atualizar') {
            $a['id'] = $getID;
            $client = $objeto->editarPerfil($a);
        }else if($toDO = 'inserir') {
            $client = $objeto->inserirCliente($a);
        }

        if($client) { header('Location: ?page=list');
        }else { header('Location: ?page=list');
        }
    }

?>

