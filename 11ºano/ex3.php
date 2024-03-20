<?php
// ex3

//defenição de variaveis
$nome = "Alice";
$idade = 38;
$peso = 55.4;
$cartadeConducao = true;
$codigoPostal = "4460-409";
$profissao = "professor";

//mostrar os valores das variaveis
echo "Dados do cliente:<br>";
echo "Nome: ". $nome . "<br>"; // o  ponto é feito para concatenar
echo "Idade: ". $idade . "<br>";
echo "Peso: ". $peso . "<br>";
echo "Carta de Condução: ". $cartadeConducao . "<br>";
echo "Codigo Postal: ". $codigoPostal . "<br>";
echo "Profissão: ". $profissao . "<br>";
// verificar o tipo de dados de uma variavel - retorna 1 se for verdadeiro/true
echo is_string($nome);
?>

    