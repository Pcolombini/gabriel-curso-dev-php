<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Loop</title>
</head>
<body>
    <header>
        <h1>Loops</h1>
    </header>
    <main>
        <section class="exercicio">
            <ul>
                <li>Faça um script, que irá calcular um valor de troco, dado 2 valores informados. 
                    <ol>
                        <li>
                            Receber 2 valores: $pago, $totalConta
                        </li>
                        <li>
                            Verificar se o valor pago é suficiente para pagar a conta, se não retornar direto
                        </li>
                        <li>
                            Se for suficiente, retornar o valor que deve ser retornado para o usuário, em notas e moedas.
                        </li>
                        <li>
                            Podemos usar os seguintes arrays:<br>$nota = array('100', '50', '10', '5', '1');<br> $centavos = array('50', '10', '5','1');
                        </li>
                    </ol>
                </li>
            </ul>
        </section>
        <?php 
            $nota = array('100', '50', '10', '5', '1');
            $centavos = array('50', '10', '5','1');
            $pago = 0;
            $totalConta =0;
            $dif = $totalConta - $pago;
            $troco = $pago - $totalConta;
           

            function notas($troco){
                $nota = array('100', '50', '10', '5', '1');
                foreach ($nota as $troco) {
                    if ($troco == array_search($troco, $nota) || $troco <= array_search($troco, $nota)) {
                       return "nota de RS".array_search($troco, $nota);
                    }
                    
                }
            }
        
        ?>
        <section>
            <h2>Conta</h2>
            <?php 
                $totalConta = number_format(150.00,2);
                echo "<strong>Valor da conta: R\$ $totalConta</strong>\n";
            ?>
            <h2>Pago</h2>
                <form action="index.php" method="get">
                    <fieldset class="fdlset">
                        <label for="Valor">Valor</label><br>
                        <input type="number" name="valor" id="valor"><br>
                        <input type="submit" value="Pagar">
                    </fieldset>
                </form>
        </section>
        <section class="resultado">
            <p>
                <?php 
                    $pago = (float) $_GET ['valor'];
                    echo("Valor pago: R$".number_format($pago,2));

                ?>
            </p>
            <p>
                <?php 
                    $dif = $totalConta - $pago;
                    $troco = $pago - $totalConta;
                    if ($pago < $totalConta) {
                        echo("Valor pago não é suficiente, faltam: R$".number_format($dif,2));
                    } else {
                       echo("Seu troco é: R$".number_format($troco,2));
                    }
                ?>
            </p>
            <p>
            <?php 
                   notas($troco);
                ?>
            </p>
        </section>
    </main>
</body>
</html>