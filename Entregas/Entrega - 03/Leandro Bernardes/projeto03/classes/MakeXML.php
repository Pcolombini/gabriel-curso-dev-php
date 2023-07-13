<?php

class MakeXML
{
    private $count;

    function criandoXML($id,$nome,$telefone,$email,$cidade,$estado,$rsmPro,$idiomas,$local){
        $doc = new DOMDocument('1.0', 'ISO-8859-1');
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;

        $title = $doc->createElement('formularioConstrusite');
        $usuario = $doc->createElement('usuario');

        $n = $doc->createElement('nome',$nome); 
        $t = $doc->createElement('telefone',$telefone);
        $e = $doc->createElement('email',$email);
        $c = $doc->createElement('cidade',$cidade);
        $est = $doc->createElement('estado',$estado);
        $rsm = $doc->createElement('resumo_profissional',$rsmPro);

        if(empty($idiomas)){
            $idio = $doc->createElement('idiomas','Somente portugues');
        }else{
            $idio = $doc->createElement('idiomas',$idiomas);
        }
        
        $local = $doc->createElement('trabalho_presencial',$local);

        $usuario->appendChild($n);
        $usuario->appendChild($t);
        $usuario->appendChild($e);
        $usuario->appendChild($c);
        $usuario->appendChild($est);
        $usuario->appendChild($rsm);
        $usuario->appendChild($idio);
        $usuario->appendChild($local);

        $title->appendChild($usuario);

        $doc->appendChild($title);
        $doc->save("formularios/formularioCandidato".$id.".xml");
        $doc->saveXML();
    }

}

?>