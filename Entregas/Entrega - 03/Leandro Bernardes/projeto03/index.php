<?php

require 'config.php';

$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
$filename = 'pages/'.$page.'.php';

if(file_exists($filename)){
    require $filename;
}else{
    echo("<h1>Em espera...</h1>");
}

?>