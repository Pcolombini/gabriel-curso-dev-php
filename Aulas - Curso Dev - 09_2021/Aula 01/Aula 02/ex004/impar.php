<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Resultado</h1>
    </header>
    <main>
        <div>

            <?php 
                $numero = $_GET["numeroUm"];
                $numeroPar = (int) $numero;
                
                if($numeroPar %2 == 0){            
                    echo "Seu número é $numeroPar e ele é PAR<br>";     
                }else {
                    echo "Seu número é $numeroPar e ele é ÍMPAR<br>";
                }
                ?>
        </div>
        <div>

            <?php 
                $numeroDois = $_GET["numeroDois"];
                $numeroParDois = (int) $numeroDois;
                
                if($numeroParDois %2 == 0){            
                    echo "Seu número é $numeroParDois e ele é PAR<br>";     
                    }else {
                        echo "Seu número é $numeroParDois e ele é ÍMPAR<br>";
                    }
            ?>
        </div>
        <div>
            <a href="http://127.0.0.1/estudos/curso_dev_gabriel/Aulas%20-%20Curso%20Dev%20-%2009-2021/Aula%2002/ex004/ex004.php"><input type="button" value="Voltar"></a>
        </div>
        
    </main>
</body>
</html>