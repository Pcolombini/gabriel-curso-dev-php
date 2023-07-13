<?php 
require 'config.php';

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
$filename = 'Pages/' . $page . '.php';

if (file_exists($filename)){
    require $filename;
}
?>