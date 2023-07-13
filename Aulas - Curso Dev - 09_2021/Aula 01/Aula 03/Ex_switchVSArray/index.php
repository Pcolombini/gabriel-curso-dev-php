<?php 

function getTextUsingSwitchCase($index)
{
    switch ($index) 
    {
        case 1:
            echo  'Número um';
            break;
        case 2:
            echo 'Número dois';
            break;
        default:
            echo '??????';
            break;
    }
}

getTextUsingSwitchCase(0);

echo PHP_EOL.PHP_EOL;

function getTextUsingArray($index)
{
    $numero = [
        1 => 'numero um',
        2 => 'numero dois'
    ];
    if(isset($numero[$index]))
    {
        echo $numero[$index];
    } else {
        echo '?????';
    }
}

getTextUsingArray(2);