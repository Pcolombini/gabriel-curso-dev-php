<?php 
     $con = new Connect();
     $data = $con->tempoContar();


         echo "<br><br><br>";

         echo "<table border=1";
         echo "<tr>";
         echo "<td>Nome</td>";
         echo "<td>Dias</td>";
         echo "<td>Devolução Realizada";
         echo "</tr>";

     foreach ($data as $value){
    if($value['devolucao_realizada_locacao']){
        $msg = "sim";
    }else {
        $msg = "não";
    }
        echo "<tr>";
        echo "<td>" . $value['nome_cliente'] . "</td>";
        echo "<td>" . $value['qntd_tempo'] . "</td>";
        echo "<td>" . $msg . "</td>";
        echo "</tr>";
    }
        echo "</table>";
