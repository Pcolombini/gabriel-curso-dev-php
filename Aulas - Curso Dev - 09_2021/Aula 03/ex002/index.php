<!-- 2) Dado o seguinte array:
$nomes = array(“Gabriel”, “Izabella”, “Pedro”, “Davi”, “Arthur”,”Sobral”,
“Diego”, “João”, “Santos”, “Henrique”, “Roberto”, “Júlio”, “Márcio”);
- Verifique:
- Se um determinado nome informado, está presente nesta lista ou não.
- Caso positivo, print uma frase com o nome localizado.
- Caso não esteja, adicione este nome no array, e retorne o array.
- Conte a quantidade de itens do array antes, e depois da validação.
- Informe se a quantidade foi alterada, caso sim, mostre o valor
adicionado -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <header>
        <h1>Arrays</h1>
    </header>
    <main>
        <?php 
            $nome = 'novo';
            $nomes = array(
                'Gabriel', 
                'Izabella',
                'Pedro',
                'Davi',
                'Arthur',
                'Sobral',
                'Diego',
                'João', 
                'Santos',
                'Henrique', 
                'Roberto', 
                'Júlio',
                'Márcio'
        );
        ?>
        <pre>
            <p>
                <?php 
                print_r($nomes);
                echo "<br>Quantidade de elementos no array: ";
                print_r(count($nomes))
                ?>
            </p>
        </pre>
        <section>
            <p>
                <?php 
                    if(!in_array('novo',$nomes)){
                        echo ("Não está na lista, faça um push");
                        array_push($nomes,$nome);
                            if(in_array($nome,$nomes)){
                                echo"<br>".("\nPush concluido!"."<br>");
                                print("Novo nome: $nome");
                            }
                    } else {
                        echo("Júlio está na posição: ");
                        print_r(array_search('Júlio',$nomes));    
                    }
                    

                    array_push($nomes,'Paschoal');
                ?>
            </p>
            <pre>
                <p>
                    <?php 
                    echo "<br>Quantidade de elementos no array: ";
                    print_r(count($nomes))
                    ?>
                </p>
            </pre>
        </section>
    </main>
</body>
</html>