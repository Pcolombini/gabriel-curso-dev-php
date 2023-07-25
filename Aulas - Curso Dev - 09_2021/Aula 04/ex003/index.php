<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Trabalhe Conosco</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form action="confirmacao.php" method="post" id="fomulario">
        <fieldset>
            <legend>Trabalhe Conosco</legend>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Digite seu nome" required><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" placeholder="Digite o telefone" required><br>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" placeholder="digite@email.com" required><br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade" placeholder="Digite a cidade" required><br>
            <label for="Estado">Qual seu Estado</label><br>
            <select name="estado" id="estado">
                <option value="MG">MG</option>
                <option value="MG">SP</option>
                <option value="MG">RJ</option>
                <option value="MG">ES</option>
            </select><br><br>
            <label for="resumo">Resumo Profissional</label><br>
            <textarea name="resumo" id="resumo" cols="30" rows="10" placeholder="Conte um pouco sobre você"></textarea><br><br>
            <label for="idiomas">Idiomas:</label><br>
            <input type="checkbox" name="ingles" id="ingles" value="Inglês"><label for="ingles">Inglês</label><br>
            <input type="checkbox" name="espanhol" id="espanhol"><label for="espanhol">Espanhol</label><br><br>
            <label for="disponibilidade">Diponível para trabalho presencial</label><br>
            <input type="radio" name="disponibilidadeSim" id="disponibilidade"><label for="sim">Sim</label><br>            
            <input type="radio" name="disponibilidadeNao" id="disponibilidade"><label for="nao">Não</label><br>         
            <input type="submit" value="Enviar"><br>   
        </fieldset>
    </form>
    <script>

    </script>
</body>
</html>

