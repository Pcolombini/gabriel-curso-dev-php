<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 006</title>
</head>
<body>
    <!--
        1. Faça um script que calcule a área de um quadrado, em seguida mostre o dobro desta área para o usuário.
    -->
    <header>
        <h1>
            Área do Quadrado
        </h1>
    </header>
    <main>
        <div>
            <p>
                A área do quadrado é obtida a partir do calculo de seus lados <sup>x</sup> a sua altura!
            </p>
            <p>Como o quadrado tem lados iguais, basta pegar a medida de um dos lados e elevar ao quadrado.</p>
            <p>
            Para a realização usamos a fórmula da área <strong>A = b. h</strong>, assim um de seus lados será a base (b) e o outro a altura (h).
            </p>
        </div>
    </main>
    <aside>
        <div>
            <form action="index.php" method="get"
            style="margin: 3px;">
                <fieldset>
                    <label for="altura">Altura</label><br>
                    <input type="number" name="alturaH" id="alturaH"><br>
                    <label for="altura">Largura</label><br>
                    <input type="number" name="baseB" id="baseB">
                    <button type="submit" style="margin: 2px;">Calcular</button>
                </fieldset>
            </form>
        </div>
    </aside>
    <footer>
        <div>
            <p>
                A área do seu quadrado é:
                <strong>
                    <?php 
                        $h = (int) $_GET ['alturaH'];
                        
                        $b = (int) $_GET ['baseB'];
                        
                        echo $a = $b*$h;
                    ?>
                </strong>
            </p>
        </div>
    </footer>
</body>
</html>