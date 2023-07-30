<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 005</title>
</head>
<body>
    <!--
        Faça um script que receba 5 números, imprima a soma, e caso a soma for
        maior que a quantidade de números informados, printe uma string
        informado isto. 
    -->
    <header>
        <h1 id="title" style="text-align: center;">Digite 5 Números</h1>
    </header>
    <main>
        <form action="soma.php" method="get">
            <fieldset>
                <div>
                    <label for="numeroUm"><strong>
                         Número Um</strong>
                        </label><br>
                        <input type="number" name="numeroUm" id="numeroUm">
                </div>
                <div>
                    <label for="numeroDois"><strong>
                         Número Dois</strong>
                        </label><br>
                        <input type="number" name="numeroDois" id="numeroDois">
                </div>
                <div>
                    <label for="numeroTres"><strong>
                         Número Tres</strong>
                        </label><br>
                        <input type="number" name="numeroTres" id="numeroTres">
                </div>
                <div>
                    <label for="numeroQuatro"><strong>
                         Número Quatro</strong>
                        </label><br>
                        <input type="number" name="numeroQuatro" id="numeroQuatro">
                </div>
                <div>
                    <label for="numeroCinco"><strong>
                         Número Cinco</strong>
                        </label><br>
                        <input type="number" name="numeroCinco" id="numeroCinco">
                </div>
                <div>
                    <button type="submit" style="cursor: pointer; margin: 2px;">Enviar</button>
                </div>
            </fieldset>
        </form>
    </main>
</body>
</html>