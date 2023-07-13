<?php

//var_dump($con->getEstados());
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$con = new Connection();

if ($id) {
    $tipo = 'update';
    $aux = $con->getCandidato($id);
} else {
    $tipo = 'insert';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <linK rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/jquery.js"></script>
    <script src="javascript/validate.js"></script>
    <script src="javascript/scriptValidacao.js"></script>
    <!--<script src="javascript/script.js"></script>-->
    <script src="javascript/ajax.js"></script>
</head>
<body>
    <div class="container box-form">
        <div class="row">
            <div class="col-md-3 col-lg-4"></div>
            <div class="col-12 col-md-6 col-lg-4">
                <h1 class="title-form">Formulario de Vagas</h1>
                <form method="POST" action="" id="construForm">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="userName" name="userName" value="<?= !empty($id) ? $aux[0]["nome_candidato"] : "" ?>" aria-describedby="nameHelp" placeholder="Digite seu nome..." required>
                        <div id="nameHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="userPhone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="userPhone" name="userPhone" value="<?= !empty($id) ? $aux[0]["phone_candidato"] : "" ?>" placeholder="Digite seu telefone..." required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?= !empty($id) ? $aux[0]["email_candidato"] : "" ?>" placeholder="Digite seu email..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="userCidade" class="form-label">Cidade</label>
                        <select class="form-select" name="userCidade" id="userCidade" required>
                            <option value="" selected>Escolha a cidade</option>
                            <?php
                                if(!empty($id)){
                                    echo('<option value="'.$aux[0]["id_cidade"].'" selected>'.$aux[0]["nome_cidade"].'</option>');
                                }else{
                                    echo('<option value="" selected>Escolha a cidade</option>');
                                }

                                foreach($con->getCidades() as $value){
                                    if(!empty($id) && $aux[0]["id_cidade"] == $value["id_cidade"]){
                                        continue;
                                    }
                                    echo('<option value="'.$value["id_cidade"].'">'.$value["nome_cidade"].'</option>');
                                }

                            ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="userVaga" class="form-label">Vagas</label>
                        <select class="form-select" name="userVaga" id="userVaga" required>
                            <?php
                                if(!empty($id)){
                                    echo('<option value="'.$aux[0]["id_vaga"].'" selected>'.$aux[0]["nome_vaga"].'</option>');
                                }else{
                                    echo('<option value="" selected>Escolha a vaga</option>');
                                }

                                foreach($con->getVagas() as $value){
                                    if(!empty($id) && $aux[0]["id_vaga"] == $value["id_vaga"]){
                                        continue;
                                    }
                                    echo('<option value="'.$value["id_vaga"].'">'.$value["nome_vaga"].'</option>');
                                }

                            ?>
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <label for="userResumo" class="form-label">Resumo Profissional</label>
                        <textarea class="form-control" id="userResumo" name="userResumo" rows="3" placeholder="<?= !empty($id) ? $aux[0]["resumo_candidato"] : "Digite seu resumo..." ?>"></textarea>
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
                            <input class="form-check-input" type="radio" name="userNao" id="userSim"  <?= !empty($id) && $aux[0]["local_candidato"] == 'V' ? 'checked' : ''?>>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Não
                            </label>
                            <input class="form-check-input" type="radio" name="userNao" id="userNao" <?= !empty($id) && $aux[0]["local_candidato"] == 'F' ? 'checked' : ''?>>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $tipo ?>" id="userType" name="typeAction">
                    <input type="hidden" value="<?= $id ?>" id="userId" name="typeAction">    
                    <button id="btnEnv" name="btnEnv" class="btn btn-primary form-control"><?= !empty($id) ? "Atualizar" : "Cadastrar"?></button>
                </form>
                <div id="resultado"></div>
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