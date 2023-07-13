<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" name="deletarCliente">
    <h3>Are you sure?</h3>
    <button type="submit" value="sim" name="btdelete">sim</button>
    </form>
    <a href="?page=list"><button>Cancelar</button></a>


</body>
</html>

<?php

    $objeto = new Connect();
    $id = filter_input(INPUT_GET,'id_cliente',FILTER_VALIDATE_INT);

    if($_POST) {
        $deletar = $objeto->deletarCliente($id);

        if($deletar) {
            header('Location: ?page=list');
        }
    }

?>