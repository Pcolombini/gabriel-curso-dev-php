<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html{
            margin: 2px;
        }
    </style>
    <title>Loop</title>
</head>

<body>
    <header>
        <h1>Loops</h1>
    </header>
    <!-- <main> -->
    <!-- <h2>While and doWhile</h2> -->
    <?php
    // $num = 1 ;
    // while($num <= 10){
    //     if($num == 5){
    //         echo '<br>';
    //         echo "\$num é igual a 5, loop encerrado";
    //         break;
    //     }
    //     echo '<br>';
    //     echo $num;
    //     $num++;
    // }
    ?>
    <!-- <h2>For</h2> -->
    <?php
    // for ($i=0; $i < 10; $i++) { 
    //     echo '<br>';
    //     echo $i;
    // }
    ?>
    <!-- <h2>Forach</h2> -->
    <?php
    // echo"<p>For normal<br></p>";
    // $vet = array(1,2,3,4,5);
    // for ($i=0; $i <5 ; $i++) { 
    //     $vetCont = $vet[$i];
    //     echo '<br>';
    //     echo $vetCont;
    // }
    // echo"<p>Foreach<br></p>";
    // foreach ($vet as $item) {
    //     echo '<br>';
    //     echo $item;
    // }
    ?>
    </main>
    <main>
        <p>
            <ul>
                <li>
                    Faça um script, que receberá um valor X <br>Caso o valor seja menor que 20, exiba a frase: “O valor é menor que 20” <br>E vá incrementando esse número X recebido, até o número atingir o valor solicitado. 
                </li>
            </ul>
        </p>
        <section>
            <form action="index.php" method="get">
                <fieldset >
                    <label for="Digite um número">
                        Digite um número
                    </label><br><br>
                    <input type="number" name="número" id="número"><br>
                    <input type="submit" value="Enviar" style="margin-top: 3px;">
                </fieldset>
            </form>
        </section>
        <section>
            <p>
                <strong>
                    <?php 
                    $numero = (int) $_GET ['número'];
                    echo "O número digitado é: $numero".'<br>';
                        do {
                            if ($numero < 20) {
                                echo("\nO valor é menor que 20!");
                            }
                            echo '<pre>';
                            echo $numero;
                            $numero++;
                        } while ($numero < 20);
                        echo ("\nValor agora é = a 20!");
                    ?>
                </strong>
            </p>
        </section>
    </main>
</body>

</html>