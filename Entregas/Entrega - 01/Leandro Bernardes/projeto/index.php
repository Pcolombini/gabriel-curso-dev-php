<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/jquery.js"></script>
    <script src="javascript/validate.js"></script>
    <script src="javascript/scriptValidacao.js"></script>
</head>
<body>
    <div class="container box-form">
        <div class="row">
            <div class="col-md-3 col-lg-4"></div>
            <div class="col-12 col-md-6 col-lg-4">
                <h1 class="title-form">Formulario de Vagas</h1>
                <form method="POST" action="validacao.php" id="construForm">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="userName" name="userName" aria-describedby="nameHelp" placeholder="Digite seu nome..." required>
                        <div id="nameHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="userPhone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="userPhone" name="userPhone" placeholder="Digite seu telefone..." required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Digite seu email..." required>
                    </div>
                    <div class="mb-3">
                        <label for="userEndereco" class="form-label">Endereco</label>
                        <input type="text" class="form-control" id="userEndereco" name="userEndereco" placeholder="Digite seu endereço..." required>
                    </div>
                    <div class="mb-3">
                        <label for="userEstado" class="form-label">Estado</label>
                        <select class="form-select" name="userEstado" id="userEstado" required>
                            <option selected value="">Estado...</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                            <option value="RJ">RJ</option>
                            <option value="ES">ES</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userResumo" class="form-label">Resumo Profissional</label>
                        <textarea class="form-control" id="userResumo" name="userResumo" rows="3" placeholder="Digite seu resumo profissional..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fala outros idiomas?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ingles" id="userIngles" name="userIngles">
                            <label class="form-check-label" for="userIngles">
                                Inglês
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="espanhol" id="userEspanhol" name="userEspanhol">
                            <label class="form-check-label" for="userEspanhol">
                                Espanhol
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Disponível para trabalho presencial?</label>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Sim
                            </label>
                            <input class="form-check-input" type="radio" name="userNao" id="userSim">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Não
                            </label>
                            <input class="form-check-input" type="radio" name="userNao" id="userNao">
                        </div>
                    </div>    
                    <button type="submit" class="btn btn-primary form-control">Enviar</button>
                </form>
            </div>
            <div class="col-md-3 col-lg-4"></div>
        </div>
    </div>

    <!--Javascript Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" 
    integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" 
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>