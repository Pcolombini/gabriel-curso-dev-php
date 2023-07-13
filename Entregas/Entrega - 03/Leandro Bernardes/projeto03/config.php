<?php
//constantes
define("DB_HOST","localhost");
define("DB_NAME","vagas");
define("DB_USER","root");
define("DB_PWD","");

spl_autoload_register(function($classname){
    $namespace = 'classes/'.$classname.'.php';

    if(file_exists($namespace)){
        require $namespace;
    }
});

?>