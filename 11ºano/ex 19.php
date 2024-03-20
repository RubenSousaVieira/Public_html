<?php
// ex 19
//Utiliza a estrutura de repetição Foreach para listar os valores de um array $listacompras

// defenição de um arrsay $listacompras
$listacompras = array("Arroz", "Água", "Peixe", "Bananas");

// adicionar dois items ao array
array_push($listacompras, "Iogurtes", "Peras");

// listar os valores do array $listacompras
foreach($listacompras as $value) {
    echo $value . "<br>";
}
?>