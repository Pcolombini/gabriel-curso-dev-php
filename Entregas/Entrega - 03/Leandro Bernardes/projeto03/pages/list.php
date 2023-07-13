<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <span style="font-weight: bold; font-size: 20px;">Lista de Candidatos</span>
    <a href="?page=form"><button style="margin: 10px;">Cadastrar</button></a>
    <table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>Vaga</th>
        <th>Resumo</th>
        <th>Idiomas</th>
        <th>Trabalho Local</th>
        <th>Ações</th>
    </tr>
    <?php
        $con = new Connection();
        
        foreach($con->getCandidatos() as $candidato)
        {
            echo("<tr>");
            echo('
            <td>'.$candidato["nome_candidato"].'</td>
            <td>'.$candidato["phone_candidato"].'</td>
            <td>'.$candidato["email_candidato"].'</td>
            <td>'.$candidato["nome_cidade"].'</td>
            <td>'.$candidato["nome_vaga"].'</td>
            <td>'.$candidato["resumo_candidato"].'</td>
            <td>'.$candidato["idiomas_candidato"].'</td>
            <td>'.$candidato["local_candidato"].'</td>
            <td>
                <a href="?page=form&id='.$candidato["id_candidato"].'"><button>Atualizar</button></a>
                <a href="?page=delete&id='.$candidato["id_candidato"].'"><button>Deletar</button></a>
            </td>
            ');
            echo("</tr>");
        }
    ?>
    </table> 
</body>
</html>