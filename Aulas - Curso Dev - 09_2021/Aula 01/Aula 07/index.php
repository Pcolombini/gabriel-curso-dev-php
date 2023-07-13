<?php

include "confing.php";

$con = (new Connect) ->getmovies();

var_dump($con);

