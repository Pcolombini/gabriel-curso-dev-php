<!-- Considere as idades das seguintes pessoas:
● Jaqueline: 28
● Bruno: 29
● Fernanda: 18
● Rafael: 21
● Luna: 32
1. Crie um script para calcular a média de idade do grupo.
2. Quais dessas pessoas estão abaixo da média de idade? E quais estão acima? -->

<?php 

$idadeJ = 28;
$idadeB = 29;
$idadeF = 18;
$idadeR = 21;
$idadeL = 32;

$nomeJ = 'Jaqueline';
$nomeB = 'Bruno';
$nomeF = 'Fernanda';
$nomeR = 'Rafael';
$nomeL = 'Luna';

$media = ($idadeJ+$idadeB+$idadeF+$idadeR+$idadeL)/5;

echo "A média das idades é ".$media." anos!\n".PHP_EOL;


if($idadeJ >= $media){
	echo $nomeJ." Possue idade acima da média! $idadeJ anos\n";
}else {
	echo $nomeJ." Possue idade abaixo da média! $idadeJ anos\n";
}
if($idadeB >= $media){
	echo $nomeB." Possue idade acima da média! $idadeB anos\n";
}else {
	echo $nomeB." Possue idade abaixo da média! $idadeB anos\n";
}
if($idadeF >= $media){
	echo $nomeF." Possue idade acima da média! $idadeF anos\n";
}else {
	echo $nomeF." Possue idade abaixo da média! $idadeF anos\n";
}
if($idadeR >= $media){
	echo $nomeR." Possue idade acima da média! $idadeR anos\n";
}else {
	echo $nomeR." Possue idade abaixo da média! $idadeR anos\n";
}
if($idadeL >= $media){
	echo $nomeL." Possue idade acima da média! $idadeL anos\n";
}else {
	echo $nomeL." Possue idade abaixo da média! $idadeL anos\n";
}



