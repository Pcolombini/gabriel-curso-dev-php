<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 005</title>
</head>
<body>
    <header style="margin: 2px;">
        <h1><strong>Resultado</strong></h1>
    </header>
    <main>
        <div style="margin: 2px;">
            <p style="margin: 2px;">A soma dos números digitados é:
            <strong >
                <?php 

                    $numeroUm = (int) $_GET['numeroUm'];
                    
                    $numeroDois = (int) $_GET['numeroDois'];
                    
                    $numeroTres = (int) $_GET['numeroTres'];
                    
                    $numeroQuatro = (int) $_GET['numeroQuatro'];
                    
                    $numeroCinco = (int) $_GET['numeroCinco'];
                    

                    function soma ($a){
                        return $a;
                    }

                    $resultado = soma($numeroUm + $numeroDois + $numeroTres + $numeroQuatro + $numeroCinco);

                    // $soma = (int) $_GET['numeroUm']
                    // + (int) $_GET['numeroDois'] +(int)  $_GET['numeroTres'] + (int) $_GET['numeroQuatro']
                    // + (int) $_GET['numeroCinco'];
                    // echo("$soma");
                    // if ($soma < 5) {
                    //     echo"A soma dos número é maior que a quantidade de números digitados!";
                    // }
                ?>
            </strong>
            </p>
            <p style="margin: 2px;">
                <?php 
                    echo $resultado.'<br>';
                    if ($resultado > 5) {
                        echo "A soma dos números, é maior que a quantidade de números digitados!";
                    }
                ?>
            </p>
        </div>
        <div style="margin: 2px;">
            <a href="http://127.0.0.1/estudos/curso_dev_gabriel/Aulas%20-%20Curso%20Dev%20-%2009-2021/Aula%2002/ex005/"><button type="submit">Voltar</button></a>
        </div>
    </main>
</body>
</html>