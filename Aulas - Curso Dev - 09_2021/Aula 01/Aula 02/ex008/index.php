<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 008</title>
</head>
<body>
    <!--
         Faça um script que peça o tamanho de um arquivo para download (em MB) e a velocidade de um link de Internet (em Mbps), calcule e informe o tempo aproximado de download do arquivo usando este link (em minutos).
    -->
    <header>
        <h1>Calculo velocidade download</h1>
    </header>
    <main>
        <div>
            <p>
                Qual o tamanho do arquivo para download
            </p>
            <div>
                <form action="index.php" method="get">
                    <label for="tamanho">
                        MB  
                    </label>
                    <input type="number" name="tamanho" id="tamanho"><br>
                    <p>Qual a velocidade da sua conexão</p>
                    <label for="velocidade">
                        Mbps
                    </label>
                    <input type="number" name="velocidade" id="velocidade"><br>
                    <button type="submit" style="margin-top: 5px;">CALCULAR</button>
                </form>
            </div>
        </div>
        <div>
            <p>
                Download em: 
                <strong>
                    <?php 
                        $MB = (double) $_GET['tamanho'];
                        $Mbps = (double) $_GET['velocidade'];
                        $tempo = $MB / ($Mbps / 8);
                        
                        print(number_format($tempo,1)."s");
                        try {
                            if($MB == 0 or $MB == null && $Mbps == 0 || $Mbps == null){
                                throw new Exception ( "Digite números válidos!");
                            }

                        } catch (Exception $e) {
                            echo "ERRO... ".$e->getMessage();
                            exit(1);
                        }
                    ?>
                </strong>
            </p>
        </div>
    </main>
</body>
</html>