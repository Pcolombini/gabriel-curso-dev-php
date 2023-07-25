<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form action="index.php" method="get">  
        <fieldset>
            <legend>Dados cadastrais</legend>
            <label for="name">Nome</label><br>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome"><br>
            
            <label for="telefone">Telefone</label><br>
            <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone"><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Digite seu email"><br><br>
            <input type="submit" value="Enviar"><br>
        </fieldset>
    </form>
    <?php 
        function campoVazio($dados)
        {
            if (empty($dados['nome'])) {
                echo 'Campo nome vazio!';
                exit(1);        
            } 

            if (empty($dados['telefone'])) {
                echo 'Campo telefone vazio!';
                exit(1);
            } 

            if (empty($dados['email'])) {
                echo 'Campo email vazio!';
                exit(1);
            } 
        }
    ?>
    <p><strong>
        <?php 
               
            $dados = array
            (
                'nome' => filter_input(INPUT_GET, 'nome'),
                'telefone' => filter_input(INPUT_GET, 'telefone'),
                'email' => filter_input(INPUT_GET, 'email')
            );

            campoVazio($dados);

            
            echo 'Olá '.$dados['nome'].'<br>';
            echo "Seu telefone e e-mail são: ";
            echo $dados['telefone']."<br>";
            echo $dados['email'];

            // print_r($dados);

       
        ?>
    </p></strong>
</body>
</html>