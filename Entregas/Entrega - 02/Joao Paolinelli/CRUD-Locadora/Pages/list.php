
<html>
  <head>
    <style>
      table{font-family: arial, sans-serif; border-collapse: collapse; width: 100%;}
      td,th {border: 1px solid #dddddd;text-align: left;padding: 8px;}
      tr:nth-child(even){background-color: #dddddd;}
    </style>

    <script>
      $(document).ready(function() {
        $("#flip").click(function() {
          $("#panel").slideToggle();
        });
      });
    </script>

    <title>Lista de Clientes</title>
  </head>
  <body>

    <h2>CRUD Locadora</h2>
    <a href="?page=form&id_cliente= ">Cadastrar    |</a>
    <a href="?page=desativado&exc_clliente= F">Clientes desativados</a>


    <?php
      // include 'time.php';
      $objeto = new Connect();
      $clientesAtivos = $objeto->getClienteAtivo();
      echo '<hr>';
      echo '<table> 
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Email</th>
          <th>Opcoes</th>
        </tr>';

        foreach ($clientesAtivos as $chave =>$clientes) {
          $movie = $objeto->getTempo_FilmeAlugado($clientes['id_cliente']);

          echo '<tr>   
            <th ">'.$clientes['nome_cliente'].'</th>
            <th>'.$clientes['telefone_cliente'].'</th>
            <th>'.$clientes['email_cliente'].'</th>
            <th><a href="?page=form&id_cliente='.$clientes['id_cliente'].'">Editar</button>
            <a style="margin-left:10px" href="?page=delete&id_cliente='.$clientes['id_cliente'].'"> Apagar</button>
            <a style="margin-left:10px" href="?page=time&id_cliente='.$clientes['id_cliente'].'">Historico</button></th>';
          echo '</tr>';
        };
      echo '</table>';
    ?>

  </body>
  <script>
    $(document).ready(function(){
        $('#mostrar').on('click',function(){
            $('.filmes').slideToggle();
        })
        // if($verHistorico != null) {
        //     $('#filme').slideToggle();
        // }
    })
</script>
</html>