<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" name="deletCliente">
        <h1>VOCE TEM CERTEZA DISSO?</h1>
        <button type="submit" value="sim" style="width: 100px; margin-bottom: 10px;" name="btnDelete">sim</button>
    </form>
    <a href="?page=list"><button>Cancelar</button></a>
</body>
</html>

<?php

$con = new Connection();
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

if($_POST)
{
    $aux = $con->deleteCliente($id);

    if($aux)
    {
        header('Location: ?page=list');
    }
}


?>