<?php
//tudo constante
define("DB_HOST","localhost"); //host
define("DB_NAME","locadora"); //nome do banco
define("DB_USER","root"); //usuario
define("DB_PWD",""); //senha vazia

//chamado automaticamente
spl_autoload_register(function($classname){
    $namespace = 'Classes/'.$classname.'.php';
    
    if(file_exists($namespace)){
        require $namespace;
    }
});

?>