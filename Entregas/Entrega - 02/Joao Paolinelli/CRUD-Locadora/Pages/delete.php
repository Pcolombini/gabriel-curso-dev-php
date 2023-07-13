<?php

    $objeto = new Connect();
    $id = filter_input(INPUT_GET,'id_cliente',FILTER_VALIDATE_INT);
?>

<html>
    <head> <title>CRUD-DELETE</title></head>
    <body>
        <form action="" method="POST" name="deletarCliente">
            <h3>Are you sure?</h3>
            <button type="submit" value="<" name="btdelete">sim</button>
        </form>
        <a href="?page=list"><button>Cancelar</button></a>
    </body>
</html>

<?php

    if($_POST) {               
        $deletar = $objeto->deletarCliente($id);

        if($deletar) { header('Location: ?page=list');
        }else { header('Location: ?page=list');
        }
    }
?>

