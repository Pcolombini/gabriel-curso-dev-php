<?php

include 'config.php';


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <title>Envio do frete</title>
    <script>
        $(document).ready(function() {
            $("#botao").click(function() {
                Swal.fire({
                    title: 'Tem certeza que deseja finalizar a compra?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Compra realizada!',
                            '',
                            'success'
                        );
                        Swal.fire({
                            title: 'Informe seu email!',
                            input: 'text',
                            inputAttributes: {
                                autocapitalize: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Enviar',
                            showLoaderOnConfirm: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: `Seu email sera enviado para ${result.value}`,
                                })
                                $.ajax({
                                    method: "POST",
                                    url: "checar.php",
                                    dataType: 'json',
                                    //data: $("#form").serialize(),
                                    data: {
                                        'email': result.value,
                                        'formData': $("#form").serialize()
                                    }
                                }).done(function(msg) {
                                    console.log(msg);
                                    $("#resultado").html(msg.msg);

                                });
                            }
                        })
                    } else {
                        Swal.fire(
                            'Compra não realizada...',
                            '',
                            'info'
                        )
                    }
                })

            });
        });
    </script>
</head>

<body>
    <center>
        <form action="" method="POST" id="form">
            <label>
                <h2>Digite seu nome para o envio do email com os valores:</h2>
            </label>
            <input type="text" name="nome" id="nome" required><br><br>
            <label>Selecione seu produto:</label>
            <select name="produto">
                <?php
                $con_p = new Joaolucas\Frete\Classes\Produtos;
                $data_p = $con_p->getProdutos();

                foreach ($data_p as $value) {
                    echo "<option value=" . $value['id_produto'] . ">" . $value['nome_produto'] . " valor: R$" . number_format($value['valor_produto'], 2, ',', '') . "</option>";
                }

                ?>
            </select><br><br>
            <label>Selecione seu frete:</label>
            <select name="frete">
                <?php
                $con_p = new Joaolucas\Frete\Classes\Frete;
                $data_p = $con_p->getFrete();

                foreach ($data_p as $value) {
                    echo "<option value=" . $value['id_frete'] . ">" . $value['nome_frete'] . "</option>";
                }

                ?>
            </select><br><br>
            <button type="button" id="botao">Enviar</button>
        </form>
        <div id="resultado"></div>
</body>

</html>