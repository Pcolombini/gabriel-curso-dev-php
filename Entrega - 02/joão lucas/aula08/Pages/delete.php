<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        
        <label>Are you sure?</label><br>
        <label>You won't be able to revert this!</label><br>
        <button type="submit" name="btn_action" value="btn_action">Yes,delete it!</button>
    </form>

    <a href="?page=list"><button>Cancel</button></a>
    
</body>
</html>
<?php 
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

if($_POST){
$con = new Connect();
$data = $con->deleteCliente($id);

echo "<br><br>Cliente excluido!";

}
?>