<?php

define("DB_HOST", "localhost");
define("DB_NAME", "vagas");
define("DB_USER", "root");
define("DB_PWD", "");


spl_autoload_register(function ($class_name) {

    $class = array('/Classes');
    foreach ($class as $value) {
        $class_name = str_replace('\\', '/', $class_name);
        if (file_exists(__DIR__ . $value . "/" . $class_name . '.php')) {
            include __DIR__ . $value . "/" . $class_name . '.php';
        }
    }
});
