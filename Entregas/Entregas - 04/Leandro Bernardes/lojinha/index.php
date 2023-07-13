<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="javascript/ajax.js"></script>
</head>
<body>
    <h1>Calcula Frete</h1>
    <form method="POST" action="" id="formXD">
        <label for="fname">Produto</label><br>
        <select name="idProduto" id="idProduto">
            <?php

            //use App\Compra;

            use App\Frete\Correios;
            use App\Frete\Fretes;
            use App\Frete\Jadlog;
            use App\Frete\Tnt;
            use App\Produto;

            include 'config.php';

            //$con = new \App\Produto();
            $prod = new Produto();
            

            foreach($prod->getProdutos() as $produto){
                echo('<option value="'.$produto["id_produto"].'">'.$produto["nome_produto"].' - R$ '.$produto["valor_produto"].'</option>');
            }

            
            ?>
        </select><br><br>
        <label for="lname">Frete:</label><br>
        <select name="idFrete" id="idFrete">
        <?php

        $fretes = new Fretes();

        foreach($fretes->getFretes() as $frete){
            echo('<option value="'.$frete["id_frete"].'">'.$frete["nome_frete"].'</option>');
        }

        ?>
        </select><br><br>
        <input type="button" name="btnEnv" id="btnEnv" value="Calcular">
    </form>
    <div id="resultado"></div>
</body>
</html>