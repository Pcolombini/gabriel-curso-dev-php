<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 007</title>
</head>
<body>
    <!--
        Faça um script que peça a temperatura em graus Farenheit, transforme e mostre a temperatura em graus Celsius.
        C = (5 * (F-32) / 9)
    -->
    <header>
        <h1>Conversor Temperatura</h1>
    </header>
    <main>
        <div>
            <p>
                Vamos converter graus Farenheit para Celsius!
            </p>
        </div>
        <div>
            <form action="index.php" method="get">
                <label for="grausC">Graus F°</label><br>
                <input type="number" name="grausC" id="grausC">
                <input type="submit" value="enviar">
            </form>
        </div>
        <p>
            Graus C° = 
            <strong>
                <?php 
                    $f = (double) $_GET ['grausC'];

                    $formula = (5*($f-32)/9);
                    echo number_format($formula,1);
                ?>
            </strong>
        </p>
        <hr>
    </main>

</body>
</html>