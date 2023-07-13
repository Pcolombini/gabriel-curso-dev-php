<h3>Filmes Alugados</h3>
<table border="1">
<tr>
    <th>Nome do Cliente</th>
    <th>Filme</th>
    <th>Tempo Locado</th>
    <th>Atrasado</th>
</tr>
<?php
    $con = new Connection();
    
    foreach($con->getLocados() as $filme)
    {
        $duracao = !empty($filme["duraLocacao"]) ? $filme["duraLocacao"]." dias" : "Em posse do cliente";
        $atrasado = !empty($filme["duraLocacao"]) ? ($filme["devolvido"] == 'F' ? "Sim" : "Nao" ) : "-";
        $color = $atrasado == "Sim" ? "red" : "green";

        echo("<tr>");
        echo('
        <td>'.$filme["nome_cliente"].'</td>
        <td>'.$filme["nome_filme"].'</td>
        <td>'.$duracao.'</td>
        <td style="color: '.$color.';">'.$atrasado.'</td>
        ');
        echo("</tr>");
    }
?>
</table> 
