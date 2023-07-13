<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$con = new Connection();

if ($id) {
    $tipo = 'update';
    $aux = $con->getCliente($id);
} else {
    $tipo = 'insert';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <h1>Formulario</h1>
    <form action="" method="POST" id="formAtualiza" name="formAtualiza">
        <label for="nameUser">Nome: </label><br>
        <input type="text" id="nameUser" name="nameUser" value="<?= !empty($id) ? $aux[0]["nome_cliente"] : "" ?>"><br>
        <label for="telUser">Telefone: </label><br>
        <input type="text" id="telUser" name="telUser" value="<?= !empty($id) ? $aux[0]["telefone_cliente"] : "" ?>"><br>
        <label for="emailUser">Email: </label><br>
        <input type="email" id="emailUser" name="emailUser" value="<?= !empty($id) ? $aux[0]["email_cliente"] : "" ?>"><br><br>
        <input type="hidden" value="<?= $tipo ?>" id="typeAction" name="typeAction">
        <button type="submit" id="btnEnv" name="btnEnv" value="enviar"><?= !empty($id) ? "Atualizar" : "Cadastrar" ?></button>
    </form>
</body>

</html>

<?php

$nome = filter_input(INPUT_POST, 'nameUser', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'emailUser', FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telUser', FILTER_SANITIZE_STRING);

$type = filter_input(INPUT_POST, 'typeAction', FILTER_SANITIZE_STRING);

if ($_POST){

    if ($type == 'update') {
        $aux2 = $con->attCliente($id, $nome, $email, $telefone);
        //var_dump($aux2);
    } else if ($type == 'insert') {
        $aux2 = $con->insertCliente($nome, $email, $telefone);
        //var_dump($aux2);
    }

    if ($aux2) {
        header('Location: ?page=list');
    }
}

?>