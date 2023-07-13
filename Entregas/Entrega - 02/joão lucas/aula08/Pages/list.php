<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <a href='?page=form'><button class="cadastro">Cadastro</button></a>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php 
            $con = new Connect();
            $data = $con->getClientes();

            foreach ($data as $value){
                echo "<tr>";
                echo "<td>" . $value['nome_cliente'] . "</td>";
                echo "<td>" . $value['telefone_cliente'] . "</td>";
                echo "<td>" . $value['email_cliente'] . "</td>";
                echo "<td><a href='?page=form&id=". $value['id_cliente']."'><button>Editar</button></a>
                      <a href='?page=delete&id=". $value['id_cliente']."'><button>Excluir</button></a></td>";
                echo "</tr>";
            }
        ?>
    </table>

    <?php 
    include 'extra.php'
    ?>
</body>

</html>