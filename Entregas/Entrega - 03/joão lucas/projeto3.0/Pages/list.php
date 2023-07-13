<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos</title>
    <link rel="stylesheet" href="css/design3.css">
    <link rel="shortcut icon" href="Imagens/icon.png">
</head>

<body>
    <center>
        <a href='?page=form'><button class="cadastro">Cadastrar</button></a><br><br>
        <table border=1>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Estado</th>                
                <th>Resumo</th>
                <th>Idiomas</th>
                <th>Disponível</th> 
                <th>Vaga</th>
                <th>Ação</th>
            </tr>         
            <?php 
                $con = new Connect();
                $data = $con->getClientes();

                foreach($data as $value){
                    echo "<tr>";
                    echo "<td>" . $value['id_candidato'] . "</td>";
                    echo "<td>" . $value['nome_candidato'] . "</td>";
                    echo "<td>" . $value['telefone_candidato'] . "</td>";
                    echo "<td>" . $value['email_candidato'] ."</td>";
                    echo "<td>" . $value['nome_cidade'] ."</td>";
                    echo "<td>" . $value['nome_estado'] ."</td>";
                    echo "<td>" . $value['resumo_candidato'] ."</td>";
                    echo "<td>" . $value['idiomas_candidato'] ."</td>";
                    echo "<td>" . $value['disponivel_candidato'] ."</td>";
                    echo "<td>" . $value['nome_vaga'] ."</td>";
                    echo "<td><a href='?page=form&id=". $value['id_candidato']."'><button class='editar'>Editar</button></a>
                          <a href='?page=delete&id=". $value['id_candidato']."'><button class='excluir'>Excluir</button></a></td>";
                    echo "</tr>";
                }
            
            ?>
        </table>

</body>

</html>