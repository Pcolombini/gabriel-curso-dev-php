<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Candidato</title>
    <link rel='stylesheet' href='css/design4.css'>
</head>
<body>
    <form method="POST" action="">
        
        <label>Você tem certeza?</label><br>
        <label>Você não será capaz de reverter essa ação!</label><br>
        <button type="submit" name="btn_action" value="btn_action">Sim, deletar!</button>
    </form>

    <a href="?page=list"><button class="cancel">Cancel</button></a>
    
</body>
</html>
<?php 
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

if($_POST){
$con = new Connect();
$data = $con->deleteCandidato($id);

echo "<br><br>Cliente excluido!";

}
?>