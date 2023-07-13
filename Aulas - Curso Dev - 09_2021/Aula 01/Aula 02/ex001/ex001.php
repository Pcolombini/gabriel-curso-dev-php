<!-- Um cliente fez a compra dos seguintes itens em uma loja virtual:
● Bolsa feminina: R$89,90
● Carteira de viagem: R$49,00
● Óculos de sol: R$250,00
1. Escreva um script para calcular o valor total da compra.
2. Qual o valor médio que esse cliente gastou nessa compra?
3. Supondo que o cliente tenha usado um cupom de 10% de desconto, qual
seria o valor final da compra nesse caso? -->

<?php

$itemUm = "Bolsa Feminina";
$itemDois = "Óculos de Sol";
$itemTres = "Carteira de Viajem";

$$itemUm = 89.9;
$$itemDois= 49.0;
$$itemTres= 250.0;

$total = $$itemUm + $$itemDois + $$itemTres;

echo $itemUm." R$ ".$$itemUm.PHP_EOL;
echo $itemDois." R$ ".$$itemDois.PHP_EOL;
echo $itemTres." R$ ".$$itemTres.PHP_EOL;

echo "Total R$".$total.PHP_EOL;