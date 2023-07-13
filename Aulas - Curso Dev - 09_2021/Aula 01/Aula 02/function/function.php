<?php

// 2. Escreva uma função que receba o nome do usuário logado 
// e mostre uma mensagem de boas-vindas aos usuários do sistema // galax Imob. 
// Você deve
// usar pelo menos uma variável e uma constante no script.

define('SYS','Galax IMOB');

function nome($nome){
	// $nome = $nome;
	return print "Olá $nome!\nSeja bem vindo ao ".SYS;
}

$access = nome("Paschoal");