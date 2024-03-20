<?php
// ex4

//definição de um array $cores
$cores = array("amarelo", "azul", "verde", "preto", "rosa", "roxo", "branco", "vermelho");

//definição de um array associativo
$carro = array ("Marca"=>"Renault", "Modelo"=>"Megane", "Cilindrada"=>"1500", "Ano"=>"2000", "Combustivel"=>"Diesel");

//mostrar os valores do array
print_r($cores);
echo "<br>";
print_r($carro);
echo "<br>";

//mostra o numero de cores do array $cores
echo ("O array cores têm " . count($cores) . " cores.");
?>