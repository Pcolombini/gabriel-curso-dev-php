<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação dados cadastrais</title>
    <link rel="stylesheet" href="style.css">
    <style>
        html{
            font-size:13pt;
        }

        .title{
            font-size: 20pt !important;
        }
    </style>
</head>
<body>
    <?php 
        $dadosArray = [
            'nome' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
            'telefone' => filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'cidade' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING),
            'estado' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING),
            'resumo' => filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_STRING),
            'ingles' => filter_input(INPUT_POST, 'ingles', FILTER_SANITIZE_STRING),
            'espanhol' => filter_input(INPUT_POST, 'espanhol', FILTER_SANITIZE_STRING),
            'disponibilidadeSim' => filter_input(INPUT_POST, 'disponibilidadeSim', FILTER_SANITIZE_STRING),
            'disponibilidadeNao' => filter_input(INPUT_POST, 'disponibilidadeNao', FILTER_SANITIZE_STRING),
        ];        
    ?>
    <main>
        <section class="conteudo">
            <p>
                <?php
                    if ((!empty($dadosArray['nome']) && !empty($dadosArray['telefone']) && !empty($dadosArray['email']) && !empty($dadosArray['cidade']) && !empty($dadosArray['estado']) && !empty($dadosArray['resumo']))) {
                    echo '<strong><span class="title">Dados Recebidos!</span></strong><br><br>';
                    echo "<ul><li> Nome: ".$dadosArray['nome']."</li></ul><br>";
                    echo "<ul><li> Telefone: ".$dadosArray['telefone']."</li></ul><br>";
                    echo "<ul><li> E-mail: ".$dadosArray['email']."</li></ul><br>";
                    echo "<ul><li> Cidade: ".$dadosArray['cidade']."</li></ul><br>";
                    echo "<ul><li> Estado: ".$dadosArray['estado']."</li></ul><br>";
                    echo "<ul><li> Resumo: ".$dadosArray['resumo']."</li></ul><br>";
                    } 

                    if (!empty($dadosArray['espanhol']) && !empty($dadosArray['ingles'])) {
                        echo "<ul><li> Idioma: Inglês </li></ul><br><ul><li> Idioma: Espanhol </li></ul><br>";
                    } else if (!empty($dadosArray['espanhol'])) {
                        echo "<ul><li> Idioma: Espanhol </li></ul><br>";
                    } else if (!empty($dadosArray['ingles'])) {
                        echo "<ul><li> Idioma: Inglês </li></ul><br>";
                    }

                    if (!empty($dadosArray['disponibilidadeNao'])) {
                        echo "<ul><li> Disponibilidade : Não</li></ul><br>";
                    } else {
                        echo "<ul><li> Disponibilidade : Sim</li></ul><br>";
                    }
                ?>
            </p>
        </section>
    </main>
</body>
</html>

