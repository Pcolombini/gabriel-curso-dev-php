<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Document</title>

</head>

<body>
  <!DOCTYPE html>
  <html>

  <head>
    <script>
      $(document).ready(function() {
        $("#flip").click(function() {
          $("#panel").slideDown("slow");
        });
      });
    </script>
    <style>
      #panel,
      #flip {
        padding: 5px;
        text-align: center;
        background-color: #e5eecc;
        border: solid 1px #c3c3c3;
      }

      #panel {
        padding: 50px;
        display: none;
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td,
      th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>

  <body>

    <h2>Aula 08</h2>
    <a href="?page=form&id_cliente= ">Cadastrar</a>

    <?php
    // include 'time.php';
    $objeto = new Connect();
    $clientesAtivos = $objeto->getClienteAtivo();
    // var_dump($clientesAtivos);
    echo '<hr>';
    echo '<table> 
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Opcoes</th>
            <tr>';

    foreach ($clientesAtivos as $clientes) {
      $idCliente = $clientes['id_cliente'];
      $nomeCliente = $clientes['nome_cliente'];
      $telefoneCliente = $clientes['telefone_cliente'];
      $emailCliente = $clientes['email_cliente'];
      $excClliente = $clientes['exc_clliente'];
      echo
      '
            
                <th><a id="flip" href ="?page=time&id_cliente=' . $idCliente . '" onclick="visualizarFilmes();">' . $clientes['nome_cliente'] . '</a></th>' . '
                
                <th>' . $clientes['telefone_cliente'] . '</th>' . '
                <th>' . $clientes['email_cliente'] . '</th>' . '
                <td><a href="?page=form&id_cliente=' . $idCliente . '">Editar</button>
                <a href="?page=delete&id_cliente=' . $idCliente . '">Apagar</button></td>
                
            </tr>';
    };
    echo '</table>';



    ?>

  </body>

  </html>


</body>

</html>