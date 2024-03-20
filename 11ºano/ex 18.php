<?php
// ex 18
// Lista com um for os valores de um array, $cores, com o mínimo de valores (8 cores)

//Defenição de um arry $cores
$cores =  array("Amarelo", "Azul", "Verde", "Preto", "Branco", "Vermelho", "Laranja", "Cinzento");

// o count permite obter o numero total de elementos dentro do array
for ($i = 0; $i < count($cores); $i++) {
    echo $cores[$i] . "<br>"; //mostra o valor dentro da posicao 1 com o array
}
?>