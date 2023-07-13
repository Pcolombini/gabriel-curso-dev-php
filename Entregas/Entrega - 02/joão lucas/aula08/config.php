<?php 

define("DB_HOST","localhost");
define("DB_NAME","locadora");
define("DB_USER","root");
define("DB_PWD","");

spl_autoload_register(function ($class_name){

    $namespace = 'Classes/' . $class_name . '.php';
    if(file_exists($namespace)){

    require $namespace;
    }

});
