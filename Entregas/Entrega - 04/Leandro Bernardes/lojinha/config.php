<?php

//tudo constante
define("DB_HOST","localhost"); //host
define("DB_NAME","lojinha"); //nome do banco
define("DB_USER","root"); //usuario
define("DB_PWD",""); //senha vazia

//chamado automaticamente
spl_autoload_register(function($classname){
    $classArray = array('');

    foreach($classArray as $class){
        $classname = str_replace('\\','/',$classname);
        if(file_exists(__DIR__.$class.'/'.$classname.'.php')){
            include __DIR__.$class.'/'.$classname.'.php';
        }
    }
});

?>