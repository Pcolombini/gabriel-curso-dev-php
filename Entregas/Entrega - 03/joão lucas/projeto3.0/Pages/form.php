<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $tipo = 'update;';
    $con = new Connect;
    $data = $con->candidatos($id);
} else {
    $tipo = 'insert;';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhe Conosco</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="js/script2.js"></script>
    <link rel="stylesheet" href="css/design2.css">
    <link rel="shortcut icon" href="Imagens/icon.png">
    <script>
        $(document).ready(function() {
            $("#botao").click(function() {
                $.ajax({
                    method: "POST",
                    url: "checar.php",
                    dataType: 'json',
                    data: $("#ConoscoForm").serialize(),
                }).done(function(msg) {
                    console.log(msg);
                    $("#resultado").html(msg.msg);

                });
            });
        });
    </script>
</head>

<body>
    <center>
        <h1>Formulário Trabalhe Conosco</h1>
        <hr>
        <form method="POST" action="" id="ConoscoForm">
            <label></label>
            <label>Nome: </label>
            <input type="text" name="nome" id="nome" required autofocus placeholder="Digite seu nome aqui..." value="<?= isset($data[0]["nome_candidato"]) ? $data[0]["nome_candidato"] : "" ?>"><br><br>
            <label>Telefone:</label>
            <input type="tel" name="telefone" id="telefone" required placeholder="Digite seu telefone aqui..." value="<?= isset($data[0]["telefone_candidato"]) ? $data[0]["telefone_candidato"] : "" ?>"><br><br>
            <label>Email:</label>
            <input type="email" name="email" id="email" required placeholder="Digite seu email aqui..." value="<?= isset($data[0]["email_candidato"]) ? $data[0]["email_candidato"] : "" ?>"><br><br>
            <label>Endereço:</label><br>
            <select name="cidade" id="cidade" required>
                <?php
                if ($tipo == "update;") {
                    echo "<option value=" . $data[0]['id_cidade'] . ">" . $data[0]["nome_cidade"] . "</option>";
                } else {
                    echo "<option value=''>Selecione uma cidade</option>";
                }
                ?>
                <?php
                $con = new Connect;
                $datac = $con->getCidades();

                foreach ($datac as $value) {
                    echo "<option value='" . $value['id_cidade'] . "'>" . $value['nome_cidade'] . "</option>";
                }
                ?>
            </select>
            <select name="estado" id="estado" required>
                <?php
                if ($tipo == "update;") {
                    echo "<option value=" . $data[0]['id_estado'] . ">" . $data[0]["uf_estado"] . "</option>";
                } else {
                    echo "<option value=''>Selecione um estado</option>";
                }
                ?>
                <?php
                $con = new Connect;
                $datae = $con->getEstados();

                foreach ($datae as $value) {
                    echo "<option value='" . $value['id_estado'] . "'>" . $value['uf_estado'] . "</option>";
                }
                ?>
            </select><br><br>
            <label>Resumo profissional:</label><br>
            <textarea name="rpro" id="rpro" rows="7" cols="30" required placeholder="Digite seu resumo profissional aqui..."><?=$data[0]['resumo_candidato']  ?></textarea><br><br>
            <label>Fala outros idiomas?</label><br>
            <?php
            if ($tipo == "update;") {
                if ($data[0]['idiomas_candidato'] == "Inglês") {

                    echo "<input type='checkbox' name='ing' id='ing' value='ing' checked>
        <label>Inglês</label><br>
        <input type='checkbox' name='spain' id='spain' value='spain'>
        <label>Espanhol</label><br><br>";
                } else if ($data[0]['idiomas_candidato'] == "Espanhol") {
                    echo "<input type='checkbox' name='ing' id='ing' value='ing'>
        <label>Inglês</label><br>
        <input type='checkbox' name='spain' id='spain' value='spain' checked>
        <label>Espanhol</label><br><br>";
                } else {
                    echo "<input type='checkbox' name='ing' id='ing' value='ing' checked>
        <label>Inglês</label><br>
        <input type='checkbox' name='spain' id='spain' value='spain' checked>
        <label>Espanhol</label><br><br>";
                }
            } else {
                echo "<input type='checkbox' name='ing' id='ing' value='ing'>
        <label>Inglês</label><br>
        <input type='checkbox' name='spain' id='spain' value='spain'>
        <label>Espanhol</label><br><br>";
            }
            ?>
            <label>Disponível para trabalho presencial?</label><br>
            <?php
            if ($tipo == "update;") {
                if ($data[0]['disponivel_candidato'] == "V") {
                    echo "<label>Sim</label>
                <input type='radio' value='V' name='presen' id='sim' checked><br>
                <label>Não</label>
                <input type='radio' value='F' name='presen' id='nao'><br><br>";
                } else {

                    echo "<label>Sim</label>
        <input type='radio' value='V' name='presen' id='sim'><br>
        <label>Não</label>
    <input type='radio' value'F' name='presen' id='nao' checked><br><br>";
                }
            } else {
                echo "<label>Sim</label>
        <input type='radio' value='V' name='presen' id='sim'><br>
        <label>Não</label>
        <input type='radio' value='F' name='presen' id='nao'><br><br>";
            }
            ?>
            <label>Vagas de Trabalho:</label><br>
            <select name='vaga' id='vaga' required>
                <?php
                if ($tipo == "update;") {
                    echo "<option value=" . $data[0]['id_vaga'] . ">" . $data[0]["nome_vaga"] . "</option>";
                } else {
                    echo "<option value=''>Selecione uma vaga</option>";
                }
                ?>
                <?php
                $con = new Connect;
                $data = $con->vagas();
                foreach ($data as $value) {
                    echo "<option value='" . $value['id_vaga'] . "'>" . $value['nome_vaga'] . "</option>";
                }
                ?>
            </select><br><br>
            <?php
            if ($tipo == "update;") {
                echo "<button type='button' id='botao'>Editar</button>";
            } else {
                echo "<button type='button' id='botao'>Cadastrar</button>";
            }

            ?>
            <input type="hidden" name="action" value="<?= $tipo ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
        <br>
        <a href="?page=list"><button>Voltar</button></a>
        <br><br>
        <div id="resultado"></div>

</body>

</html>

<?php
//variaveis
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone',);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$rpro = filter_input(INPUT_POST, 'rpro', FILTER_SANITIZE_STRING);
$ing = filter_input(INPUT_POST, 'ing');
$spain = filter_input(INPUT_POST, 'spain');
$sim = filter_input(INPUT_POST, 'sim');
$nao = filter_input(INPUT_POST, 'nao');



//Arquivo xml
$xml = '<?xml version = "1.0" encoding = "UTF-8"?>';
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

for ($i = 0; $i < count($meus_links); $i++) {
    $xml .= '<link>';
    $xml .= '<nome>' . $meus_links[0]['nome'] . '</nome>';
    $xml .= '<telefone>' . $meus_links[0]['telefone'] . '</telefone>';
    $xml .= '<email>' . $meus_links[0]['email'] . '</email>';
    $xml .= '<cidade>' . $meus_links[0]['cidade'] . '</cidade>';
    $xml .= '<estado>' . $meus_links[0]['estado'] . '</estado>';
    $xml .= '<resumo_profissional>' . $meus_links[0]['resumo_profissional'] . '</resumo_profissional>';

    if ($ing && $spain) {
        $xml .= '<idioma>Idiomas falados: Inglês e espanhol.</idioma>';
    } else if ($ing) {
        $xml .= '<idioma>Idioma falado: Inglês.</idioma>';
    } else if ($spain) {
        $xml .= '<idioma>Idioma falado: Espanhol.</idioma>';
    } else {
        $xml .= '<idioma>Nenhum outro idioma falado.</idioma>';
    }

    if ($sim) {
        $xml .= '<disponibilidade>Disponibilidade para trabalhar presencialmente.</disponibilidade>';
    } else {
        $xml .= '<disponibilidade>Sem disponibilidade para trabalhar presencialmente.</disponibilidade>';
    }
    $xml .= '</link>';
}

$xml .= '</links>';

//escrever no arquivo
$fp = fopen('meus_links.xml', 'w+');
fwrite($fp, $xml);
fclose($fp);


if ($_POST) {

    if (!empty($_POST['spain']) && empty($_POST['ing'])) {
        $idiomas = "Espanhol";
    } else if (!empty($_POST['spain']) && $_POST['ing']) {
        $idiomas = "Inglês e espanhol";
    } else if ($_POST['ing'] && empty($_POST['spain'])) {
        $idiomas = "Inglês";
    } else {
        $idiomas = "Nenhum outro idioma falado.";
    }

    if ($_POST['presen'] == "V") {
        $disponivel = "V";
    } else {
        $disponivel = "F";
    }
}

if ($_POST) {

    $con = new Connect();
    $data = $con->save($_POST, $idiomas, $disponivel);
}

?>