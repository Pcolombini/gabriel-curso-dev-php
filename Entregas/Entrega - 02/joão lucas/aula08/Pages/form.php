<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $tipo = 'update;';
    $con = new Connect();
    $data = $con->clientes($id);
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
    <title>Document</title>
</head>

<body>

    <form action="" method="POST">
        <label>Cadastrar/Alterar</label><br><br>
        <label for="fname">Nome:</label><br>
        <input type="text" id="fname" name="fname" value="<?=isset($data[0]["nome_cliente"])?$data[0]["nome_cliente"]:""?>"><br>
        <label for="lname">Telefone:</label><br>
        <input type="tel" id="tel" name="tel" value="<?=isset($data[0]["telefone_cliente"])?$data[0]["telefone_cliente"]:""?>"><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?=isset($data[0]["email_cliente"])?$data[0]["email_cliente"]:""?>"><br><br>
        <input type="submit" value="Alterar/Cadastrar">
        <input type="hidden" name="action" value="<?= $tipo ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
    </form>

</body>

</html>

<?php

if ($_POST) {

    $con = new Connect();
    $data = $con->save($_POST);
}


?>