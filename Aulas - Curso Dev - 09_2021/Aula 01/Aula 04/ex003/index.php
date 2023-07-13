<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <title>Trabalhe Conosco</title>
    <link rel="stylesheet" href="style.css">
    <?php require_once 'funcoes.php';?>
</head>
<body>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Trabalhe Conosco</legend>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Digite seu nome"><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" placeholder="Digite o telefone"><br>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" placeholder="digite@email.com"><br>
            <label for="cidade">Cidade:</label><br>
            <input type="text" name="cidade" placeholder="Digite a cidade"><br>
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
            <input type="radio" name="disponibilidade" id="disponibilidade"><label for="sim">Sim</label><br>            
            <input type="radio" name="disponibilidade" id="disponibilidade"><label for="nao">Não</label><br>         
            <input type="submit" value="Enviar"><br>   
        </fieldset>
    </form>
</body>
</html>