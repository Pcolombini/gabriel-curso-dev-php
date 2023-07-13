<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>IF, ELSE, ARRAY e Mais</title>
</head>
<body>
    <!--
        1) Faça um script, que receba um valor,e retorne se o valor informado é par ou ímpar.
    -->
    <header>
        <h1>Par ou Ímpar</h1>
    </header>
    <main style="border: 1px solid black;">
        <section>
            <section>
                <p>
                    Digite um número
                </p>
            </section>
            <form action="index.php" method="get">
                <input type="number" name="numero" id="numero" placeholder="Número" required>
                <input type="submit" value="Rodar">
            </form>
        </section>
        <section>
            <h2>Resultado</h2>
        </section>
        <section>
            <p><strong>
                <?php 
                    $numero = (int) $_GET ['numero'];
                    if($numero % 2 == 0){
                    echo "O número $numero é Par";
                    } else {
                        echo "O numero $numero é Ímpar";
                    }
                ?>
            </strong></p>
        </section>
    </main>
</body>
</html>