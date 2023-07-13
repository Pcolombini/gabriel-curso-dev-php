<label for="userCidade" class="form-label">Cidade</label>
<select class="form-select" name="userCidade" id="userCidade" required>
    <option selected value="">Escolha a cidade</option>
    <?php
    
        $estado = filter_input(INPUT_GET,'ufEstado',FILTER_SANITIZE_STRING);
        $con = new Connection();

        foreach($con->getCidades($estado) as $value){
            echo('<option value="'.$value["id_cidade"].'">'.$value["nome_cidade"].'</option>');
        }
    
    ?>
</select>