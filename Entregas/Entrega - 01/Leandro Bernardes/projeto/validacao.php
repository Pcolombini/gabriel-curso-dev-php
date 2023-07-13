<?php
    //validando entradas 
    $nome = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $cidade = filter_input(INPUT_POST, 'userEndereco',FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'userEstado',FILTER_SANITIZE_STRING);
    $rsmPro = filter_input(INPUT_POST, 'userResumo',FILTER_SANITIZE_STRING);
    $ingles = filter_input(INPUT_POST, 'userIngles',FILTER_SANITIZE_STRING);
    $espanhol = filter_input(INPUT_POST, 'userEspanhol',FILTER_SANITIZE_STRING);
    $sim = filter_input(INPUT_POST, 'sim',FILTER_SANITIZE_STRING);
    $nao = filter_input(INPUT_POST, 'nao',FILTER_SANITIZE_STRING);
    
    //printa na tela conferindo se nao esta vazio
    function validandoImpressao($n,$t,$e,$c,$est,$rsm,$i,$esp,$sim,$nao){
        echo('<h1>Dados do Concorrente</h1>');
        //verificando nome
        if(!empty($n)){
            echo('Nome: '.$n.'<br>');
        }else{
            echo('Nome: INFORMACAO NAO PASSADA<br>');
        }
        //verificando telefone
        if(!empty($t)){
            echo('Telefone: '.$t.'<br>');
        }else{
            echo('Telefone: INFORMACAO NAO PASSADA<br>');
        }
        //verificando email
        if(!empty($e)){
            echo('Email: '.$e.'<br>');
        }else{
            echo('Email: INFORMACAO NAO PASSADA<br>');
        }
        //verificando cidade
        if(!empty($c)){
            echo('Endereco: '.$c.'<br>');
        }else{
            echo('Endereco: INFORMACAO NAO PASSADA<br>');
        }
        //verificando estado
        if(!empty($est)){
            echo('Estado: '.$est.'<br>');
        }else{
            echo('Estado: INFORMACAO NAO PASSADA<br>');
        }
        //verificando resumo
        if(!empty($rsm)){
            echo('Resumo Profissional: '.$rsm.'<br>');
        }else{
            echo('Resumo Profissional: INFORMACAO NAO PASSADA<br>');
        }
        //verificando idioma
        if($i && $esp){
            echo('Fala ambos os idiomas, ingles e espanhol alem de portugues<br>');
        }else if($i){
            echo('Fala apenas ingles<br>');
        }else if($esp){
            echo('Fala apenas espanhol alem de portugues<br>');
        }else{
            echo('Fala apenas portugues<br>');
        }
        //verificando disponibilidade
        if(!empty($sim)){
            echo('Tem disponibilidade para trabalho presencial<br>');
        }else{
            echo('Não tem disponibilidade para trabalho presencial<br>');
        }
    }

    //criando xml
    function criandoXML($nome,$telefone,$email,$cidade,$estado,$rsmPro,$ingles,$espanhol,$sim,$nao){
        $doc = new DOMDocument('1.0', 'ISO-8859-1');
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;

        $title = $doc->createElement('formularioConstrusite');
        $usuario = $doc->createElement('usuario');
        $idiomas = $doc->createElement('idiomas');

        $n = $doc->createElement('nome',$nome); 
        $t = $doc->createElement('telefone',$telefone);
        $e = $doc->createElement('email',$email);
        $c = $doc->createElement('cidade',$cidade);
        $est = $doc->createElement('estado',$estado);
        $rsm = $doc->createElement('resumo_profissional',$rsmPro);

        if($ingles && $espanhol){
            $i = $doc->createElement('ingles','sim');
            $esp = $doc->createElement('espanhol','sim');
        }else if($ingles){
            $i = $doc->createElement('ingles','sim');
            $esp = $doc->createElement('espanhol','nao');
        }else if($espanhol){
            $i = $doc->createElement('ingles','nao');
            $esp = $doc->createElement('espanhol','sim');
        }else{
            $i = $doc->createElement('ingles','nao');
            $esp = $doc->createElement('espanhol','nao');
        }
        
        if(!empty($sim)){
            $disp = $doc->createElement('disponibilidade','sim');
        }else{
            $disp = $doc->createElement('disponibilidade','nao');
        }
        
        $idiomas->appendChild($i);
        $idiomas->appendChild($esp);

        $usuario->appendChild($n);
        $usuario->appendChild($t);
        $usuario->appendChild($e);
        $usuario->appendChild($c);
        $usuario->appendChild($est);
        $usuario->appendChild($rsm);
        $usuario->appendChild($idiomas);
        $usuario->appendChild($disp);

        $title->appendChild($usuario);

        $doc->appendChild($title);
        $doc->save("formularioConcorrente.xml");
        $doc->saveXML();
    }

    //chamando a funcao
    validandoImpressao($nome,$telefone,$email,$cidade,$estado,$rsmPro,$ingles,$espanhol,$sim,$nao);
    criandoXML($nome,$telefone,$email,$cidade,$estado,$rsmPro,$ingles,$espanhol,$sim,$nao);

    echo("<br><a href='index.php'><button>Voltar</button></a>");

?>