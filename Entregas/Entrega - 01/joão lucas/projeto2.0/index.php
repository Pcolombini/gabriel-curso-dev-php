<?php 
header("Content-type:text/html; charset=utf8");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhe Conosco</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <center>
    <h1>Formulário Trabalhe Conosco</h1>
    <hr>
    <form method="POST" action="sucesso.php" id="ConoscoForm">
        <label></label>
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" required autofocus placeholder="Digite seu nome aqui..."><br><br>
        <label>Telefone:</label>
        <input type="tel" name="telefone" id="telefone" required placeholder="Digite seu telefone aqui..."><br><br>
        <label>Email:</label>
        <input type="email" name="email" id="email" required placeholder="Digite seu email aqui..."><br><br>
        <label>Endereço:</label><br>
        <input type="text" name="cidade" id="cidade" required placeholder="Digite sua cidade aqui...">
        <select name="estado" id="estado" required>
            <option value="">Selecione um estado</option>
            <option value="MG">MG</option>
            <option value="SP">SP</option>
            <option value="RJ">RJ</option>
            <option value="ES">ES</option>
        </select><br><br>
        <label>Resumo profissional:</label><br>
        <textarea name="rpro" id="rpro" rows="7" cols="30" required placeholder="Digite seu resumo profissional aqui..."></textarea><br><br>
        <label>Fala outros idiomas?</label><br>
        <input type="checkbox" name="ing" id="ing" value="ing">
        <label>Inglês</label><br>
        <input type="checkbox" name="spain" id="spain" value="spain">
        <label>Espanhol</label><br><br>
        <label>Disponível para trabalho presencial?</label><br>
        <label>Sim</label>
        <input type="radio" value="sim" name="presen" id="sim"><br>
        <label>Não</label>
        <input type="radio" value="nao" name="presen" id="nao"><br><br>
        <button type="submit">Enviar</button>
</form>
</body>
</html>